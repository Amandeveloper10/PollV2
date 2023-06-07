<tr>
        <td class="" nowrap>January</td>


          <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '01'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_january)) &&  (array_key_exists(sprintf('%02d', $i),$att_january))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_january['futuredate']) && (in_array(sprintf('%02d', $i),$att_january['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>



    <tr>
        <td class="" nowrap>February</td>
           <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '02'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_february)) &&  (array_key_exists(sprintf('%02d', $i),$att_february))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_february['futuredate']) && (in_array(sprintf('%02d', $i),$att_february['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>March</td>

           <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '03'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_march)) &&  (array_key_exists(sprintf('%02d', $i),$att_march))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_march['futuredate']) && (in_array(sprintf('%02d', $i),$att_march['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>April</td>



           <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '04'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_april)) &&  (array_key_exists(sprintf('%02d', $i),$att_april))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_april['futuredate']) && (in_array(sprintf('%02d', $i),$att_april['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

   <tr>
        <td class="" nowrap>May</td>


         <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '05'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_may)) &&  (array_key_exists(sprintf('%02d', $i),$att_may))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_may['futuredate']) && (in_array(sprintf('%02d', $i),$att_may['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>


    <tr>
        <td class="" nowrap>June</td>


          <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '06'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_june)) &&  (array_key_exists(sprintf('%02d', $i),$att_june))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_june['futuredate']) && (in_array(sprintf('%02d', $i),$att_june['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>

    </tr>

    <tr>
        <td class="" nowrap>July</td>


         <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '07'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_july)) &&  (array_key_exists(sprintf('%02d', $i),$att_july))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_july['futuredate']) && (in_array(sprintf('%02d', $i),$att_july['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>



    </tr>

    <tr>
        <td class="" nowrap>August</td>

             <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '08'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_august)) &&  (array_key_exists(sprintf('%02d', $i),$att_august))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_august['futuredate']) && (in_array(sprintf('%02d', $i),$att_august['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>September</td>


           <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '09'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_september)) &&  (array_key_exists(sprintf('%02d', $i),$att_september))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_september['futuredate']) && (in_array(sprintf('%02d', $i),$att_september['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>October</td>


         <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '10'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_october)) &&  (array_key_exists(sprintf('%02d', $i),$att_october))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_october['futuredate']) && (in_array(sprintf('%02d', $i),$att_october['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>November</td>


          <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '11'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_november)) &&  (array_key_exists(sprintf('%02d', $i),$att_november))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_november['futuredate']) && (in_array(sprintf('%02d', $i),$att_november['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>

    <tr>
        <td class="" nowrap>December</td>


         <?php for ($i=01; $i <= 31 ; $i++) {
                if(date('Y')>='2020' && date('m') < '12'){
                   echo '<td class="text-danger">-</td>';  
                }else{
                    if((!empty($att_december)) &&  (array_key_exists(sprintf('%02d', $i),$att_december))){
                        echo '<td class="text-success">P</td>';
                    }elseif(!empty($att_december['futuredate']) && (in_array(sprintf('%02d', $i),$att_december['futuredate'])) ){
                        echo '<td class="text-danger">A</td>'; 
                    }else{
                        echo '<td class="text-danger">-</td>';  
                    }
                }
     }?>
    </tr>