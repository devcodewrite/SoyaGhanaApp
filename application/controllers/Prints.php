<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Prints class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */

use Mpdf\Mpdf\Mpdf;

class Prints extends MY_Controller
{

	public function admission_form($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$student = $this->student->getOne($id);
		$filename = "form-" . $student->index_number;
		$title = "ADMISSION FORM";
		$data = [
			'student' => $student,
		];
		$c = $this->load->view('pages/prints/admission_form', $data, true);
		$header = $this->load->view('pages/prints/form_header', null, true);
		$footer = $this->load->view('pages/prints/form_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function report_cards($id = null)
	{
		$class_id = $this->input->get('class_id', true);
		if ($id === null) {
			if (!$this->input->get('class_id')) {
				show_error('Class must be sepecified!');
				return;
			}
		}

		$exams = [];
		$years = [$this->setting->getValue('current_year')]; // current year
		$semesters = [$this->setting->getValue('current_semester')]; // current semester id

		if ($this->input->get('years')) {
			$years = explode(',', urldecode($this->input->get('years', true)));
		}
		if ($this->input->get('semesters')) {
			$semesters = explode(',', urldecode($this->input->get('semesters', true)));
		}


		foreach ($years as $year) {
			foreach ($semesters as $semester) {
				if (!isset($id)) {
					$where = [
						'tests.year' => $year,
						'tests.semester_id' => $semester,
						'tests.class_id' => $class_id
					];

					$all_std_exam = $this->school->getExamReport($where);
					foreach ($all_std_exam as $std) {
						$exam = $this->school->getOneExamReport($std->student->id, $where);
						if ($exam) {
							array_push($exams, $exam);
						}
					}
				} else {
					$where = [
						'tests.year' => $year,
						'tests.semester_id' => $semester
					];
					$exam = $this->school->getOneExamReport($id, $where);
					if ($exam) {
						array_push($exams, $exam);
					}
				}
			}
		}
		$data['exams'] = $exams;
		$title = "REPORT CARD";
		$filename = "report-card-" . random_int(100000, 999999);
		$c = $this->load->view('pages/prints/report_card', $data, true);

		$header = $this->load->view('pages/prints/form_header', null, true);
		$footer = $this->load->view('pages/prints/form_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);

		//echo $c;
	}

	public function bill_invoices($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$bill = $this->bill->getOne($id);
		$filename = "invoice-" . $bill->bill_no;
		$title = "BILL INVOICE";
		$data = [
			'bill' => $bill,
		];
		$style = $this->load->view('templates/print_css', null, true);
		$c = $this->load->view('pages/prints/bill_invoice', $data, true);
		$header = $this->load->view('pages/prints/bill_header', null, true);
		$footer = $this->load->view('pages/prints/bill_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($c, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}
	public function payment_receipts($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$payment = $this->payment->getOne($id);
		$filename = "bill-payment-receipt-" . $payment->id;
		$title = "PAYMENT RECEIPT";
		$data = [
			'payment' => $payment,
		];
		$style = $this->load->view('templates/print_css', null, true);
		$c = $this->load->view('pages/prints/payment_receipt', $data, true);
		$header = $this->load->view('pages/prints/receipt_header', null, true);
		$footer = $this->load->view('pages/prints/receipt_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A5',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 25,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' => 'L',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($c, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function staffpay_receipts($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$pay = $this->staffpay->getOne($id);
		$filename = "staffpay-receipt-" . $pay->id;
		$title = "PAYMENT RECEIPT";
		$data = [
			'pay' => $pay,
			'staff' => $this->staff->getOne($pay->payslip->staff_id),
		];
		$style = $this->load->view('templates/print_css', null, true);
		$c = $this->load->view('pages/prints/pay_receipt', $data, true);
		$header = $this->load->view('pages/prints/receipt_header', null, true);
		$footer = $this->load->view('pages/prints/receipt_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A5',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 25,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' => 'L',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($c, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}
	public function payslips($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$payslip = $this->payslip->getOne($id);
		$filename = "payslip-" . $payslip->id;
		$title = "EMPLOYEE PAYSLIP";
		$data = [
			'payslip' => $payslip,
		];
		$style = $this->load->view('templates/print_css', null, true);
		$c = $this->load->view('pages/prints/payslip', $data, true);
		$header = $this->load->view('pages/prints/payslip_header', null, true);
		$footer = $this->load->view('pages/prints/payslip_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A5',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 25,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' => 'L',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($c, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function promoted_students($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$promotion = $this->promotion->getOne($id);
		$filename = "promotion-ref" . $promotion->id;
		$title = "PROMOTION LIST";
		$data = [
			'promotion' => $promotion,
		];
		$c = $this->load->view('pages/prints/promotion_list', $data, true);
		$header = $this->load->view('pages/prints/form_header', null, true);
		$footer = $this->load->view('pages/prints/form_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function dismissal_letter($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$student = $this->student->getOne($id);
		$filename = "dismissal-ref" . $student->id;
		$title = "DISMISSAL LETTER";
		$data = [
			'student' => $student,
		];
		$c = $this->load->view('pages/prints/dismissal_letter', $data, true);
		$header = $this->load->view('pages/prints/form_header', null, true);
		$footer = $this->load->view('pages/prints/form_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function leave_letter($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$leave = $this->staffleave->getOne($id);
		$filename = "leave-ref" . $leave->id;
		$title = "LEAVE APPLICATION LETTER";
		$data = [
			'leave' => $leave,
		];
		$c = $this->load->view('pages/prints/leave_letter', $data, true);
		$header = $this->load->view('pages/prints/form_header', null, true);
		$footer = $this->load->view('pages/prints/form_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 30,
			'margin_bottom' => 16,
			'margin_header' => 0,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);

		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function accounting_report()
	{

		if ($this->input->post('include_bills')) {
			$this->form_validation->set_rules('fee_type_ids[]', 'Bill Fee Types', 'required');
		}
		if ($this->input->post('include_receivings')) {
			$this->form_validation->set_rules('receiving_type_ids[]', 'Receivings Types', 'required');
		}
		if ($this->input->post('include_expenses')) {
			$this->form_validation->set_rules('expense_type_ids[]', 'Expenses Types', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', validation_errors('', ''));
			redirect('accounting/reports');
		}

		$data = [];
		$serial = random_int(100000, 999999);
		$data['serial'] = $serial;

		$rstartdate = $renddate = null;
		$title = "ACCOUNTING REPORT";

		$rdates = explode('-', $this->input->post('reporting_date', true));
		if (sizeof($rdates) === 2) {
			$rstartdate = $rdates[0];
			$renddate = $rdates[1];
			$title = "Reporting for ".date('F jS,Y',strtotime($rstartdate))." To ".date('F jS,Y',strtotime($renddate));
		}

		$posts = $this->input->post(null, true);
		$tid = 1;
		$months = $feeTypeIds = $receivingTypeIds = $expenseTypeIds = [];
		$billTable = $receivingTable = $expenseTable =  $payTable = [];
		if ($this->input->post('staff_payment_months[]')) $months = $posts['staff_payment_months'];
		if ($this->input->post('fee_type_ids[]')) $feeTypeIds = $posts['fee_type_ids'];
		if ($this->input->post('receiving_type_ids[]')) $receivingTypeIds = $posts['receiving_type_ids'];
		if ($this->input->post('expense_type_ids[]')) $expenseTypeIds = $posts['expense_type_ids'];


		if ($this->input->post('include_bills')) {
			foreach($feeTypeIds as $ftypeId){
				$feetype = $this->feetype->getOne($ftypeId);
				$where = [
					'fee_type_id' => $ftypeId,
				];

				if($rstartdate){
					array_merge($where, ['bills.created_at >=' => $rstartdate]);
				}
				if($renddate){
					array_merge($where, ['bills.created_at <=' => $renddate]);
				}
				$subTotal = 0;
				foreach($this->bill->getAllWithSummary([],$where) as $bill){
					$subTotal = $subTotal + $bill->total_amount;
				}
				array_push($billTable, (object)[
					'id' => $tid++,
					'col' => $feetype->title,
					'total' => $subTotal,
				]);
			}
		}

		if ($this->input->post('include_receivings')) {
			foreach($receivingTypeIds as $typeId){
				$type = $this->receivingtype->getOne($typeId);
				$where = [
					'receiving_type_id' => $typeId,
				];

				if($rstartdate){
					array_merge($where, ['rdate >=' => $rstartdate]);
				}
				if($renddate){
					array_merge($where, ['rdate <=' => $renddate]);
				}
			
				$subTotal = $this->receiving->getSum('amount',$where, false);		
				array_push($receivingTable, (object)[
					'id' => $tid++,
					'col' => $type->title,
					'total' => $subTotal,
				]);
			}
		}
		if ($this->input->post('include_expenses')) {
			foreach($expenseTypeIds as $typeId){
				$type = $this->receivingtype->getOne($typeId);		
				$where = [
					'expense_type_id' => $typeId,
				];

				if($rstartdate){
					array_merge($where, ['bills.created_at >=' => $rstartdate]);
				}
				if($renddate){
					array_merge($where, ['bills.created_at <=' => $renddate]);
				}
				$subTotal = $this->expense->getSum('amount',$where, false);

				array_push($expenseTable, (object)[
					'id' => $tid++,
					'col' => $type->title,
					'total' => $subTotal,
				]);
			}
		}
		if ($this->input->post('include_staff_payments')) {
			$where = [];
			if($rstartdate){
				array_merge($where, ['paid_at >=' => $rstartdate]);
			}
			if($renddate){
				array_merge($where, ['paid_at <=' => $renddate]);
			}
			$subTotal = $this->staffpay->getSum('amount', [], false);
				
			array_push($payTable, (object)[
				'id' => $tid++,
				'col' => 'Payments Made',
				'total' => $subTotal,
			]);
			
		}

		$data['billTable'] = $billTable;
		$data['receivingTable'] = $receivingTable;
		$data['expenseTable'] = $expenseTable;
		$data['payTable'] = $payTable;
		$data['title'] = $title;
		$filename = "acc-report-" . $serial;

		$style = $this->load->view('templates/print_css', null, true);
		$c = $this->load->view('pages/prints/accounting_report', $data, true);
		$header = $this->load->view('pages/prints/accounting_report_header', null, true);
		$footer = $this->load->view('pages/prints/accounting_report_footer', ['title' => $title], true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 35,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);
		$title = "Accounting Report";
		$mpdf->SetTitle($title);
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->SetHTMLHeader($header);
		$mpdf->SetHTMLFooter($footer);
		$mpdf->WriteHTML($style, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->WriteHTML($c, \Mpdf\HTMLParserMode::HTML_BODY);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}

	public function employment_form($id = null)
	{
		if ($id === null) {
			show_404();
			return;
		}
		$staff = $this->staff->getOne($id);
		$filename = "form-" . $staff->staffid;

		$data = [
			'staff' => $staff,
		];
		$c = $this->load->view('pages/prints/employment_form', $data, true);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => 'roboto',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 16,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' => 'P',
		]);
		$mpdf->SetTitle("Employment  Forms");
		$mpdf->SetAuthor($this->setting->getValue('app_name'));
		$mpdf->WriteHTML($c);
		$mpdf->Output("uploads/pdfs/$filename.pdf");
		redirect(base_url("uploads/pdfs/$filename.pdf"), 'refresh', 3);
	}
}
