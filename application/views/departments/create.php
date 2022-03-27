<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



      <?php $this->load->view('shared/header');?>

      <?php $this->load->view('shared/left-menu');?>

      <?php $this->load->view('shared/top-bar');?>
        

      <div class="content pt-5">
          <div class="pb-10">
            <div class="row g-10">

            <div class="card shadow-none border border-300 mb-3" data-component-card>
                  <div class="card-header p-4 border-bottom border-300">
                    <div class="row g-3 justify-content-between align-items-center">
                      <div class="col-12 col-md">
                        <h3 class="text-900 mb-0" >
                          <?php
                            if(isset($action) && $action == 'show' ) 
                                echo 'View Department';
                            else if(isset($action) && $action == 'edit' ) 
                                echo 'Edit Department';
                            else
                                echo 'Create New Deparment';
                          ?>
                          
                        </h3>
                      </div>
                      <div class="col col-md-auto">
                        <nav class="nav nav-underline justify-content-end border-0 doc-tab-nav align-items-center" role="tablist">
                          <a class="btn btn-sm btn-phoenix-primary preview-btn ms-2" href="<?php echo base_url()?>index.php/department">Back</a>
                        </nav>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">

                  <?php
                    if(isset($has_errors) && $has_errors)
                    {
                      
                      echo '<div class="alert alert-soft-warning alert-dismissible fade show" role="alert">';
                      echo '<strong>An Error ocurred</strong>' . validation_errors();
                      echo '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>';
                      echo '</div>';
                    }            
                  ?>

                  <?php
                    if(isset($action) && $action == 'edit' ) 
                    echo '<form method="post" action="' . base_url() . 'index.php/department/update">';
                    else
                    echo '<form method="post" action="' . base_url() . 'index.php/department/insert">';
                  ?>
                  

                  <div class="mb-3 row mt-4">
                      <label class="col-sm-2 col-form-label text-end" for="id">Id</label>
                      <div class="col-sm-4">
                          <input class="form-control outline-none" type="number" readonly id="id" name="department_id" 
                            <?php 
                              if(isset($department)) 
                                echo 'value="' . $department['department_id'] . '"';   
                            ?>
                          >        
                      </div>
                  </div>
                    
                  
                  <div class="mb-3 row mt-4">
                      <label class="col-sm-2 col-form-label text-end" for="name">Department</label>
                      <div class="col-sm-4">
                          <input class="form-control outline-none" id="name" type="text"  name="department_name" 

                          <?php 
                              if(isset($department)) 
                                echo 'value="' . $department['department_name'] . '"';   
                            ?>

                          <?php if(isset($action) && $action == 'show' ) echo 'readonly';?>
                          >        
                      </div>
                  </div>
                    
                  <div class="mb-3 row mt-4 ">
                    <div class="col-sm-6 text-end">

                    <?php 
                        if(isset($action) && $action != 'show' ) 
                        {
                          echo '<button class="btn btn-primary " type="submit"  >';
                          
  
                      if(isset($action) && $action == 'edit' ) 
                          echo 'UPDATE';
                      else
                          echo 'CREATE';
                          

                          echo '</button>';
                        }
                          
                    ?>

                    

                   
                    </div>
                  </div>

                  </form>


                  </div>

                  </div>
            </div>
              
          
          </div>
       
      
     
          
          <?php $this->load->view('shared/bottom-bar');?>


        </div>


<?php $this->load->view('shared/footer');?>
   
