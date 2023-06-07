class="table table-list" >
<thead>
<tr>
    <th>Employee Name.</th>
    <?php for ($i=1; $i <= 31; $i++) {  ?>
       <th><?php echo $i; ?></th>
    <?php } ?> 
</tr>
</thead>
<tbody>
<?php
$sl = 1;
if (!empty($all_employee)) {
foreach ($all_employee as $data) {

$load_att = $this->AttendanceModel->load_att_month_year($data->id,$month,$year);
//echo "<pre>"; print_r($load_att); die;
?>

    <tr>
        <td><?php echo $data->employee_no; ?></td>
       <?php for ($i=01; $i <= 31 ; $i++) { 
        $i = sprintf("%02d", $i);
              if((!empty($load_att)) &&  (array_key_exists($i,$load_att))){
       ?>
       <?php if((!empty($load_att)) && ($load_att[$i]=='Present')){
       ?>
          <td class="text-success">P</td>
        <?php }else{ ?>  
          <td class="text-danger">A</td> 
      <?php } ?>

    <?php }else{ ?>
      <td class="text-danger">-</td>
    <?php } } ?>
        
    </tr>                         
    <?php $sl++; } } ?>                             
</tbody>
</table>