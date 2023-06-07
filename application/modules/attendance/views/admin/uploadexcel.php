<form action="<?php echo base_url('ownercsv'); ?>" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
    <table>
        <tr>
            <td width="3%">1.</td>
            <td width="40%">
                Demo CSV
            </td>
            <td width="57%">
                <a href="<?php echo base_url(); ?>assets/img/demo_attendance.csv" title="Demo CSV Download" class="breadcrumb-item ks-breadcrumb-icon" download><span class="la la-cloud-download">Download</span></a>
            </td>
        </tr>
        <tr>
            <td width="3%">2.</td>
            <td width="40%"> Choose your file: 
            </td>
            <td width="57%">
                <input type="file" class="form-control" required="required" name="userfile" id="userfile"  align="center"/>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="col-lg-offset-3 col-lg-9">
                    <button type="submit" name="submit" class="btn btn-info" style="float: right;margin-right: -39%;">Save</button>
                </div>
            </td>
        </tr>


       
    </table> 
</form>