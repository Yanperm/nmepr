<div class="span8">

    <div class="box">
        <div class="box-header">
            <i class="icon-bar-chart"></i>
            <h5>สลากยาสำหรับสั่งจ่าย</h5>
        </div>
        <div class="box-content">
            <form class="form-signin" action="<?php echo base_url('member/booking') ?>" method="POST">
                <div class="text-center"> 
                    <img class="mb-3" src="<?php echo base_url('img/iconfinder_server-resource-scaling_4254667.svg') ?>" alt="" width="320px" height="auto">
                    <h1 class="h1 text-white"><b>Appointment</b></h1>
                    <p class="text-light"><b>ตรวจสอบคิวว่างเพื่อนัดหมายแพทย์</b></p>
                </div>
                <div class="form-label-group">                   
                    <div class="input-group mb-1 active">
                        <select name="CLINICID" class="form-control form-control-lg text-info border-light fast active" style="border: 2px solid white">
                            <?php
                            $this->db->cache_on();
                            $query = $this->db->query("SELECT * FROM tbclinic WHERE CLINICID ='CL404' and activate = 1");
                            foreach ($query->result() as $row) {
                                ?>
                                <option value="<?php echo $row->CLINICID; ?>">จองคิวที่.<?php echo $row->CLINICNAME; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>                     
                </div>
                <div class="form-label-group">
                    <input type="text" name="DATEBOOKING" id="datepicker" class="form-control text-info form-control-lg bg-light border border-info" placeholder="วันที่ต้องการรับบริการ" readonly="" required>

                </div>                
                <button class="btn btn-lg btn-success btn-block" type="submit">
                    <i class="fa fa-search"></i> 
                    Find an empty queue
                </button>
            </form>
        </div>
    </div>
</div>
</div>