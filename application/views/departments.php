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
                        <h3 class="text-900 mb-0" >Departments</h3>
                      </div>
                      <div class="col col-md-auto">
                        <nav class="nav nav-underline justify-content-end border-0 doc-tab-nav align-items-center" role="tablist">
                          <a class="btn btn-sm btn-phoenix-primary preview-btn ms-2" href="<?php echo base_url() ?>index.php/department/create">Create New</a>
                        </nav>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">

                  <?php
                    if(isset($success))
                    {
                      echo '<div class="alert alert-soft-success d-flex align-items-center" role="alert"><span class="fas fa-check-circle text-success fs-3 me-3"></span>';
                      echo '<p class="mb-0 flex-1">' . $success . '</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                  ?>

                  <div id="tableExample2" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;age&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
                        <div class="table-responsive scrollbar">
                          <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                              <tr>
                                <th class="sort desc" data-sort="name">Id</th>
                                <th class="sort" data-sort="email">Department</th>
                                <th class="sort" data-sort="age">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="list">

                              <?php

                                foreach($departments as $dep)
                                {
                                  echo '<tr>';

                                  echo '<td class="department_id">' . $dep['department_id'] . '</td>';
                                  echo '<td class="department_name">' . $dep['department_name'] . '</td>';

                                  echo '<td class="actions">';
                                  $link_view = base_url() . 'index.php/departments/show/' . $dep['department_id'];
                                  $link_edit = base_url() . 'index.php/departments/edit/' . $dep['department_id'];
                                  echo '<a href="' . $link_view . '" class="link-success">View</a>';
                                  echo '<a href="' . $link_edit . '" class="link-primary ms-2">Edit</a>';    
                                  echo '<a  class="link-danger ms-2" onclick="yes_no_question(' . $dep['department_id'] . ', \'' . $dep['department_name'] . '\')" >Delete</a>';                 
                                  echo '</td>';

                                  echo '</tr>';
                                }
                      
                              ?>

                            
                            </tbody>
                          </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                          <button class="btn btn-sm btn-falcon-default me-1 disabled" type="button" title="Previous" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
                              <ul class="pagination mb-0">
                                  <li class="active"><button class="page" type="button" data-i="1" data-page="5">1</button>
                                  </li>
                                  <li><button class="page" type="button" data-i="2" data-page="5">2</button>
                                  </li><li><button class="page" type="button" data-i="3" data-page="5">3</button></li>
                              </ul>
                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
                        </div>
                      </div>
                    
                    
            </div>

                  </div>
            </div>
              
          
          </div>
       
      
     
          
          <?php $this->load->view('shared/bottom-bar');?>


        </div>


<?php $this->load->view('shared/footer');?>

<script>

function yes_no_question(department_id, department_name)
{

  swal({
  title: "Are you sure?",
  text: "the deparment " + department_name +  " will be delete permanently!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var myForm = '<form id="delete_form" action="<?php echo base_url(); ?>index.php/department/delete" method="POST">';
      myForm += '<input name="department_id" type="number" value="' + department_id + '">';
      myForm += '</form>';

      document.body.innerHTML += myForm;
      document.getElementById("delete_form").submit();

    } 
  });

}

</script>

   
