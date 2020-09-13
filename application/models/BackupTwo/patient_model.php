<?php

class patient_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertPatient($data)
    {
        $this->db->insert('tbpatients', $data);
    }

    public function insertHistory($data)
    {
        $this->db->insert('tbpatient_history', $data);
    }

    public function insertMedical($data)
    {
        $this->db->insert('tbpatient_medical', $data);
    }

    public function insertLab($data)
    {
        $this->db->insert('tbpatient_lab', $data);
    }

    public function insertProcedure($data)
    {
        $this->db->insert('tbpatient_procedure', $data);
    }

    public function insertSick($data)
    {
        $this->db->insert('tbpatient_sick', $data);
    }

    public function insertJob($data)
    {
        $this->db->insert('tbpatient_job', $data);
    }

    function select_edit_job($data)
    {
        $query = $this->db->get_where('tbpatient_job', array('JobID' => $data));
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '
            <input type="hidden" name="JobID" value="' . $row->JobID . '">
            <h4>ส่วนที่ 1 ประวัติสุขภาพ</h4>
            <table style="width: 100%;  border: solid; border-width: 1px;">
                <tr>
                    <td align="center" style="width: 5%;">1.</td>
                    <td>โรคประจำตัว</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Diseases" value="ไม่มี"';if($row->Diseases == "ไม่มี"){$output .= 'checked';}$output .= '>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Diseases" value="มี"';if($row->Diseases == "มี"){$output .= 'checked';}$output .= '>มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="DiseasesDetail" value="' . $row->DiseasesDetail . '" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">2.</td>
                    <td>อุบัติเหตุ และผ่าตัด</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Accident" value="ไม่มี"';if($row->Accident == "ไม่มี"){$output .= 'checked';}$output .= '>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Accident" value="มี"';if($row->Accident == "มี"){$output .= 'checked';}$output .= '>มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="AccidentDetail" value="' . $row->AccidentDetail . '" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">3.</td>
                    <td>เคยเข้ารับการรักษาในโรงพยาบาล</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Hospital" value="ไม่มี"';if($row->Hospital == "ไม่มี"){$output .= 'checked';}$output .= '>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Hospital" value="มี"';if($row->Hospital == "มี"){$output .= 'checked';}$output .= '>มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="HospitalDetail" value="' . $row->HospitalDetail . '" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 5%;">4.</td>
                    <td>ประวัติอื่นที่สำคัญ</td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Others" value="ไม่มี"';if($row->Others == "ไม่มี"){$output .= 'checked';}$output .= '>ไม่มี
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="Others" value="มี"';if($row->Others == "มี"){$output .= 'checked';}$output .= '>มี
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="OthersDetail" value="' . $row->OthersDetail . '" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
            </table>
            <br>
            <h4>ส่วนที่ 2 ของแพทย์</h4>
            <table style="width: 100%;  border: solid; border-width: 1px;">
                <tr>
                    <td style=" padding-left: 12px; ">สภาพร่างกายทั่วไปอยู่ในเกณฑ์ </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="BodyHealth" value="ปกติ"';if($row->BodyHealth == "ปกติ"){$output .= 'checked';}$output .= '>ปกติ
                        </label>
                    </td>
                    <td>
                        <label class="radio">
                            <input type="radio" class="margin-r10-b5" name="BodyHealth" value="ผิดปกติ"';if($row->BodyHealth == "ผิดปกติ"){$output .= 'checked';}$output .= '>ผิดปกติ
                        </label>
                    </td>
                    <td style="width: 30%;"><input name="BodyHealthDetail" value="' . $row->BodyHealthDetail . '" class="input-large" type="text" placeholder="ระบุ"></td>
                </tr>
                <tr>
                    <td style=" padding-left: 12px; ">อาการแสดงของโรค อื่นๆ</td>
                    <td colspan="3" style="width: 30%;"><input name="OtherSymptoms" value="' . $row->OtherSymptoms . '" style="width: 96%;" type="text" placeholder="ถ้ามีระบุ"></td>
                </tr>
                <tr>
                    <td style=" padding-left: 12px; ">สรุปความเห็นและข้อแนะนำของแพทย์</td>
                    <td colspan="3" style="width: 30%;"><textarea name="Recommendation" rows="2" style="width: 96%;">' . $row->Recommendation . '</textarea></td>
                </tr>
            </table>
        <div class="modal-footer">
            <input name="Price" class="input-large" type="number" value="' . $row->Price . '" style="margin-right: 330px; margin-bottom: 0px;">
            <button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
            <button class="btn btn-primary" type="submit">บันทึก</button>
        </div>
            ';
        }
        echo $output;
    }
}
