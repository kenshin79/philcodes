<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Philhealth ICD/RVS Codes Finder</title>
    <meta name="author" content="Homer Uy Co, M.D.">
    <meta name="description" content="Philhealth ICD/RVS Codes Finder">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatables.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatables.min.js"></script>
    <script>
        $( function() {
          $(".datatable").DataTable({});
          });
    </script>
  </head>
  <body>
    <div class="container-fluid">

      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-3">Philhealth ICD and RVS Codes Finder</h1>
          <p class="lead">Code diagnoses compatible with Philhealth for effective benefit claims!</p>
          <p><small><a href="<?php echo base_url()?>" ><img src="<?php echo base_url()."assets/img/homers_seal.png";?>" height="30" width="30" ></a> hucomd 17 December 2017</small></p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8">

              <?php
                if($this->session->userdata('message')){
                  echo "<div class=\"alert alert-warning\">";
                  echo validation_errors();
                  echo "</div>";
                }
                echo form_open('welcome');
              ?>
            <div class="form-group">

              <label for="term">Enter search term (minimum 3 characters):</label>
          <?php

                echo form_input(array('name'=>'term', 'class'=>'form-control', 'value'=>$term));

          ?>
            </div>

                <button type="submit" class="btn btn-primary">Find</button>

        </div>
          </form>
      </div>
      <br/>
      <div class="row justify-content-center">
        <div class="col-8">
        <?php
          if($medical || $surgical)
          {
            if($medical == "None" && $surgical == "None")
            {
              echo "<div class=\"alert alert-info\">";
              echo "No results found for the term \"".$term."\". Please modify the search term.";
              echo "</div>";
            }
            else {
              echo "<table class=\"table table-striped datatable\">";
              echo "<thead>";
              echo "<tr>";
              echo "<td>ICD/RVS</td>";
              echo "<td>Description</td>";
              echo "<td>Total Case Rate</td>";
              echo "<td>Institutional Fee</td>";
              echo "<td>Professional Fee</td>";
              echo "</tr>";
              echo "<tbody>";
              if($medical != "None")
              {
                foreach ($medical as $row) {
                  echo "<tr>";
                  echo "<td>ICD: ".$row->icd."</td>";
                  echo "<td>".$row->description."<br/>Category: ".$row->category."</td>";
                  echo "<td>P ".$row->case_rate."</td>";
                  echo "<td>P ".$row->if."</td>";
                  echo "<td>P ".$row->pf."</td>";
                  echo "</tr>";
                }
              }
              if($surgical != "None")
              {
                foreach ($surgical as $row) {
                  echo "<tr>";
                  echo "<td>RVS: ".$row->rvs."</td>";
                  echo "<td>".$row->description."</td>";
                  echo "<td>P ".$row->case_rate."</td>";
                  echo "<td>P ".$row->if."</td>";
                  echo "<td>P ".$row->pf."</td>";
                  echo "</tr>";
                }

              }
              echo "</tbody>";
            }



          }

        ?>
        </div>
      </div>

    </div>
