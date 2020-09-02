<?php

session_start();
if (isset($_SESSION['name'])){
?>        
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">Marka</th>
              <th scope="col">Model</th>
              <th scope="col">Rok</th>
            </tr>
          </thead>
          <tbody>
              <?php
          foreach($arr_data as $result){
          echo '<tr>';
            echo '<td>'.$result['marka'].'</td>';
            echo '<td>'.$result['model'].'</td>';
            echo '<td>'.$result['rok'].'</td>';
          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        }
            else echo 'Not logged in!';
        ?>