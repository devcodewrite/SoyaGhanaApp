<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * member model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

class Member_model extends MY_Model
{

    var $table = 'members';
    var $hasOne = [
        'users:user' => 'added_by',
        'users:account' => 'user_id',
        'locales' => 'locale_id',
    ];

    var $belongsToMany = [
        'groups' => 'member_groups',
    ];

    var $hasMany = [
        'catalogs' => 'member_id',
    ];
    
    var $order = [
        'id' => 'desc'];

    /**
     * Retrive a member by member id
     * @param $memberid
     * @param Array
     */
    public function getByMemberId(string $memberid, $fields = [])
    {
        $where = ['deleted_at' => NULL, 'memberId' => $memberid];
        $query = $this->db->get_where($this->table, $where);
        return $this->getOne($query->row('id'), $fields);
    }

    /**
     * Retrive a member by group
     * @param $groupId
     * @param Array
     */
    public function getByGroup(int $groupId, $where = [], $fields = [])
    {
        $where = array_merge($where, ['group_id' => $groupId]);
        $this->db->select('id')
            ->from('member_groups')
            ->join('members', 'member_id=members.id')
            ->where($where);
            
             foreach ($this->order as $field => $order_by)
                $this->db->order_by($field, $order_by);

            $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $obj) {
            $data = $this->getOne($obj->id, $fields);
            if ($data) array_push($result, $data);
        }
        return $result;
    }

    /**
     * create a member
     * @param $data
     * @return Boolean
     */
    public function add(array $data)
    {
        $mdata = $this->extract($data);
        $mdata['user_id'] = $this->auth->getUserId();
        // transact to ensure both process are completed
        $this->db->trans_start();
        if ($this->auth->getRole()->title === 'Administrator') {
            $mdata['added_by'] = $this->auth->getUserId();
            $user = $this->user->getOneByColumn(['phone' => $mdata['phone']]);
            if ($user) {
                $mdata['user_id'] = $user->id;
            } else {
                $this->user->create([
                    'phone' => (strlen($mdata['phone']) === 10?'233'.ltrim($mdata['phone'],'0'):$mdata['phone']),
                    'name' => $mdata['name'],
                    'type' => 'Member',
                    'role_id' => $this->setting->getValue('user_member_role', 3),
                    'active' => 1,
                    'email' => $mdata['email'],
                ]);

                $mdata['user_id'] = $this->insertId();
                $this->user->uploadPhoto($mdata['user_id'], 'avatar', 'thumb_photo_url',true,'60%',['w'=>'400', 'h' => '400']);
            }
        }

        if($this->locale->getOneByColumn(
            ['name'=> ucwords(strtolower(trim($data['locale_name']))),
             'district_id' => $data['district_id']]
             )){
                $this->session->set_flashdata('error_message', $data['locale_name']." already exist choose from the list provided.");
            return false;
        }
        if(!empty($data['district_id']) && !empty($data['locale_name'])){
            $this->locale->create([
                'name' => ucwords(strtolower(trim($data['locale_name']))),
                'district_id' => $data['district_id'],
            ]);
            $mdata['locale_id'] =  $this->insertId();
        }
        $this->member->create($mdata); // create
        $mId = $this->insertId();
        $mg = [];
        foreach ($data['group_ids'] as $gid) {
            array_push($mg, [
                'group_id' => $gid,
                'member_id' => $mId,
            ]);
        }
        $this->db->insert_batch('member_groups', $mg);

        if (!$this->uploadPhoto($mId, 'avatar', 'thumb_photo_url',true,'60%',['w'=>'400', 'h' => '400'])) {
            
            return false;
        }
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * update a member data
     * @param $id, $data
     */
    public function change($id, $data)
    {
        $mdata = $this->extract($data);
        // transact to ensure both process are completed
        $this->db->trans_start();
        $this->update($id, $mdata);
        $this->db->delete('member_groups', [
            'member_id' => $id
        ]);
        $mg = [];
        if (isset($data['group_ids'])){
            foreach ($data['group_ids'] as $gid) {
                array_push($mg, [
                    'group_id' => $gid,
                    'member_id' => $id,
                ]);
            }
            $this->db->insert_batch('member_groups', $mg);
        }      

        if (!$this->uploadPhoto($id, 'avatar', 'thumb_photo_url',false,'60%',['w'=>'400', 'h' => '400'])) {
            return false;
        }
        $this->db->trans_complete();

        return $this->db->trans_status();
    } 
    public function catalog_post($start, $end)
    {
        $query = $this->db->query("SELECT * FROM catalogs inner join members on members.id=catalogs.member_id where catalogs.status='published' AND catalogs.deleted_at IS NULL order by RAND() LIMIT $start,$end");
        return $query->result_array();
    }
    public function post5()
    {
        $query = $this->db->query("SELECT catalogs.*,members.name,members.phone,members.thumb_photo_url,locales.name as locale_name,districts.name as district_name,districts.category as district_category,regions.name as region_name FROM catalogs inner join members on members.id=catalogs.member_id inner join locales on locales.id=members.locale_id inner join districts on districts.id=locales.district_id inner join regions on regions.id=districts.region_id where catalogs.status='published' AND catalogs.deleted_at IS NULL order by RAND() LIMIT 0,5");
        return $query->result_array();
    }
    public function all_groups1()
    {
        $query = $this->db->query("SELECT * from groups where status='published' AND deleted_at IS NULL  LIMIT 0,10");
        return $query->result_array();
    }
    public function all_groups2()
    {
        $query = $this->db->query("SELECT * from groups where status='published' AND deleted_at IS NULL  LIMIT 10,20");
        return $query->result_array();
    }
    public function verify_post_id($post_id)
    {
        $query = $this->db->query("SELECT catalogs.*,members.name,members.phone,members.thumb_photo_url,locales.name as locale_name,districts.name as district_name,districts.category as district_category,regions.name as region_name FROM catalogs inner join members on members.id=catalogs.member_id inner join locales on locales.id=members.locale_id inner join districts on districts.id=locales.district_id inner join regions on regions.id=districts.region_id where catalogs.status='published' AND catalogs.deleted_at IS NULL AND catalogs.id=$post_id");
        return $query->row();
    }
}
