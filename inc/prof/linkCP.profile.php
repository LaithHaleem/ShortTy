<?php
if(Session::Chk('user') == true && Session::Chk('u_id') == true) {
    $session = Session::GetSession('u_id');
    $index = 0;
    $dbInstance = new DB();
    $get = $dbInstance->G_query("SELECT * FROM `links` WHERE user_id = '{$session}'")->fetch;
    
}else {
    Messages::ErrRoute('div', 'alert alert-warning', 'Opps!! Page Not Found');
    die();
    exit();
}

?>
<div class="container">
  <div class="cpanel-links col-lg-9 mr-auto ml-auto">
      <h2>Cpanel Links</h2>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Shorted Links</th>
            <th scope="col">Reall Links</th>
            <th scope="col">Short Date</th>
            <th scope="col">Visits</th>
            <th scope="col">Control</th>
          </tr>
        </thead>
        <?php

          foreach ($get as $value) {
          $index++;
          $date = GlobalFunctions::fDate($value['sh_date'], "Y/m/d");
            echo "
        <tbody id='row-". $value['id'] ."'>
          <tr>
            <th scope='row' class='index' data-in='". $index ."'>". $index ."</th>
            <td>http://shorty.io/". $value['crpt_code'] ."</td>
            <td>". $value['org_link'] ."</td>
            <td>". $date ."</td>
            <td>". $value['url_visit'] ."</td>
            <td>
              <button type='button' class='btn btn-primary mr-1'>Edit</button><button  type='button' data-index='". $index ."' data-link='". $value['id'] ."' class='btn btn-danger delBtn'>Delete</button>
            </td>
          </tr>
        </tbody>";
          }

        ?>
      </table>
      <button class="btn btn-primary">
        <i class="fas fa-plus"></i> <a href='index.php'>Short New</a>
      </button>
  </div>
</div>
