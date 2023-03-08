<?php

class MY_Model extends CI_Model
{

    var $table = '';
    var $hasOne = [];
    var $hasMany = [];
    var $belongsTo = [];
    var $belongsToMany = [];
    var $fields = [];
    var $order = ['id' => 'desc'];

    public function __construct()
    {
        parent::__construct();
    }

    public function setOrder(array $order)
    {
        $this->order = $order;
    }
    /**
     * Retrive a single object by id
     * @param $id
     * @return stdClass
     */
    public function getOne($id, $fields = [])
    {
        $tcols = sizeof($fields) > 0 ? implode(',', $fields) : "*";

        $where = ['deleted_at' => NULL, 'id' => $id];
        $this->db->select($tcols)->distinct()->from($this->table);

        foreach ($this->belongsToMany as $table => $link_col) {
            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = singular($table);
            }

            $cluase = "$link_col." . singular($this->table) . "_id=$this->table.id";
            $this->db->join($link_col, $cluase, 'left');
        }
        $query = $this->db->where($where)->get();
        $result = $query->row();

        foreach ($this->hasOne as $table => $link_col) {
            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = singular($table);
            }
            $where2 = ['deleted_at' => NULL, 'id' => $query->row($link_col)];
            $query2 = $this->db->get_where($table, $where2);
            if ($result)
                $result->{$res_name} = $query2->row();
        }

        foreach ($this->hasMany as $table => $link_col) {

            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = $table;
            }

            $where2 = ['deleted_at' => NULL, 'id' =>  $query->row($link_col)];
            $query2 = $this->db->get_where($table, $where2);
            if ($result)
                $result->{$res_name} = $query2->result();
        }

        foreach ($this->belongsTo as $table => $link_col) {
            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = singular($table);
            }
            $where2 = [$link_col => $id];
            $query2 = $this->db->get_where($table, $where2);
            if ($result)
                $result->{$res_name} = $query2->row();
        }

        foreach ($this->belongsToMany as $table => $link_col) {
            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = $table;
            }

            $where2 = ["$table.deleted_at" => NULL, singular($this->table) . "_id" => $id];
            $cluase = "$link_col." . singular($table) . "_id=$table.id";
            $query2 = $this->db->select('*')
                ->from($table)
                ->join($link_col, $cluase)
                ->where($where2)
                ->get();

            if ($result)
                $result->{$res_name} = $query2->result();
        }
        return $result;
    }

    /**
     * Retrive records by column(s)
     * @param $cols
     * @return Array
     */
    public function getByColumn(array $cols, $fields = [], array $order = [], $limit = null)
    {
        if (sizeof($order) > 0) $this->setOrder($order);
        $tcols = sizeof($fields) > 0 ? implode(',', $fields) : "*";

        $where = array_merge(["{$this->table}.deleted_at" => NULL], $cols);
        $this->db->select($tcols)->from($this->table);

        $this->db->where($where);

        foreach ($this->order as $field => $order_by)
            $this->db->order_by($field, $order_by);

        if ($limit) $this->db->limit($limit);

        $query = $this->db->get();
        $result = [];
        foreach ($query->result() as $obj) {
            array_push($result, $this->getOne($obj->id, $fields));
        }
        return $result;
    }

    /**
     * Retrive records by column(s)
     * @param $cols
     * @return Array
     */
    public function getOneByColumn(array $cols, $fields = [])
    {

        $tcols = sizeof($fields) > 0 ? implode(',', $fields) : "*";

        $where = array_merge(["{$this->table}.deleted_at" => NULL], $cols);

        $this->db->select($tcols)->from($this->table);

        foreach ($this->belongsToMany as $table => $link_col) {
            if (strpos($table, ':') !== false) {
                $s = explode(':', $table);
                $table = $s[0];
                $res_name = $s[1];
            } else {
                $res_name = $table;
            }
            $cluase = "$link_col." . singular($table) . "_id=$table.id";
            $this->db->join($table, $cluase);
        }

        $this->db->where($where);
        foreach ($this->order as $field => $order_by)
            $this->db->order_by($field, $order_by);

        $query = $this->db->get();
        return $this->getOne($query->row('id'));
    }
    /**
     * Retrive all objects
     * @return Array
     */
    public function getAll(array $fields = [], array $order = [], $limit = null)
    {
        if (sizeof($order) > 0) $this->setOrder($order);

        $cols = sizeof($fields) > 0 ? implode(',', $fields) : "*";

        $this->db->select($cols)
            ->from($this->table)
            ->where(['deleted_at' => NULL]);
        foreach ($this->order as $field => $order_by)
            $this->db->order_by($field, $order_by);

        if ($limit) $this->db->limit($limit);

        $query = $this->db->get();
        $result = [];
        foreach ($query->result() as $obj) {
            array_push($result, $this->getOne($obj->id, $fields));
        }
        return $result;
    }

    /**
     * Create a new record
     * @param $data
     * @return Boolean
     */
    public function create(array $data)
    {
        $data = $this->extract($data);
        return $this->db->insert($this->table, $data);
    }

    /**
     * Create new records
     * @param $data
     * @return Boolean
     */
    public function createAll(array $data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    /**
     * Delete a record
     * @param $id
     * @return Boolean
     */
    public function delete(int $id)
    {
        $this->db->set('deleted_at', 'NOW()', false);
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Update records
     * @param $data, $key
     * @return Boolean
     */
    public function updateAll(array $data, $key = 'id')
    {
        $this->db->update_batch($this->table, $data, $key);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Update a record
     * @param $id
     * @return Boolean
     */
    public function update(int $id, array $data)
    {
        $data = $this->extract($data);
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->db->affected_rows() > 0;
    }



    /**
     * Count all records
     * @param $where
     * @return int
     */
    public function getCount($where = [])
    {
        $where = array_merge(['deleted_at' => NULL], $where);
        $query = $this->db->select('count(*) as total')
            ->from($this->table)
            ->where($where)
            ->get();
        return $query->row('total');
    }

    /**
     * Sum all value(s) of column(s) for sub-records
     * @param $col, $where
     * @return String
     */
    public function getSum(string $col, array $where = [], $tostr = true, $decimals = 2)
    {
        $query = $this->db->select_sum($col, 'total')
            ->from($this->table)
            ->where($where)
            ->get();

        if ($tostr) return number_format($query->row('total'), $decimals);

        return $query->row('total');
    }
    /**
     * Get id of last inserted record
     * @return Boolean
     */
    public function insertId()
    {
        return $this->db->insert_id();
    }

    /**
     * Extract only values of only fields in the table
     * @param $data
     * @return Array
     */
    protected function extract(array $data)
    {

        // filter array for only specified table data
        $filtered = array_filter($data, function ($key, $val) {
            return $this->db->field_exists($val, $this->table);
        }, ARRAY_FILTER_USE_BOTH);

        return $filtered;
    }

    /**
     * Get meta data of table
     * @param
     * @return stdClass
     */
    public function meta(string $field_name)
    {
        $fields = $this->db->field_data($this->table);
        foreach ($fields as $field) {
            if ($field->name == $field_name)
                return $field;
        }
        return null;
    }

    /**
     * Search record
     * @param $keyword, $cols, $strict
     * @return Array
     */
    public function search(string $keyword, array $cols = [], $fields = [], $strict = false, $where = [])
    {
        $this->db->select("{$this->table}.*")->from($this->table);
        $cols = sizeof($cols) > 0 ? $cols : $this->db->list_fields($this->table);
        $match = [];
        $where = array_merge(["{$this->table}.deleted_at" => NULL], $where);
        $this->db->where($where);

        if ($strict) {

            $this->db->group_start();
            foreach (explode(' ', $keyword) as $s) {
                foreach ($cols as $col) {
                    $this->db->like($col, $s);
                }
            }
            $this->db->group_end();
        } else {
            $this->db->group_start();
            foreach (explode(' ', $keyword) as $s) {
                foreach ($cols as $col) {
                    $this->db->or_like($col, $s);
                }
            }
            $this->db->group_end();
        }
        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $obj) {
            $data = $this->getOne($obj->id, $fields);
            if ($data) array_push($result, $data);
        }
        return $result;
    }

    /**
     * Upload photo
     * @param string $field_name
     * @return Boolean
     */
    public function uploadPhoto($id, string $field_name = 'photo', string $col_name = 'thumb_photo_url', $disp_error = true, $scale = '60%', $dim=['w' => 200, 'h'=>'200'])
    {
        $config['upload_path'] = './uploads/photos/' . $this->table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = uniqid($id);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            $file_data = $this->upload->data();

            $resize['image_library'] = 'gd2';
            $resize['create_thumb'] = TRUE;
            $resize['maintain_ratio'] = TRUE;
            $resize['quality'] = $scale;
            $resize['width'] = $dim['w'];
            $resize['height'] = $dim['h'];
            $resize['source_image'] = $file_data['full_path'];

            $this->load->library('image_lib', $resize);

            if (!$this->image_lib->resize()) {
                if ($disp_error) {
                    $this->session->set_flashdata('error_message', $this->image_lib->display_errors('', ''));
                }
                return false;
            }
        } else {
            if ($disp_error) {
                $this->session->set_flashdata('warning_message', $this->upload->display_errors('', ''));
                return false;
            }
            return true;
        }
        $data = [
            $col_name => base_url('uploads/photos/' . $this->table . "/" . $file_data['raw_name'] . '_thumb' . $file_data['file_ext']),
        ];
        //unlink(base_url('uploads/photos/' . $this->table . "/" . $file_data['raw_name']. $file_data['file_ext']));

        return $this->update($id, $data);
    }

    /**
     * Get photo url or an avatar
     * @return String
     */
    public function urlToAvatar($photo_url, $gender='male')
    {
        if (is_null($photo_url))
            return strtolower($gender)==='male'? site_url($this->config->item('default_user_pic_male')):site_url($this->config->item('default_user_pic_female'));
        return $photo_url;
    }

    /**
     * Get active record from list
     * @param Array
     * @return stdClass
     */
    public function getActive(array $list = [])
    {
        foreach ($list as $record) {
            if (isset($record->active)) {
                if ($record->active == true)
                    return $record;
            }
        }
        return sizeof($list) > 0 ? $list[0] : null;
    }
}
