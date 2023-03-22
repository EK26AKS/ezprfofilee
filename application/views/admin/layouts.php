<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">


      <?php if (check_package_features('vcard', $user->id) == TRUE): ?>
      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Digital Vcards </h3>
          </div>
      
          <div class="col-md-12">
            <div class="row layrow">
     
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style0') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style0') ? 'checked' : '' ?> name="layout" value="style0" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style0.png') ?>">
                        </label>
                    </div>
                </div> 

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style1') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style1') ? 'checked' : '' ?> name="layout" value="style1" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style1.png') ?>">
                        </label>
                    </div>
                </div> 

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style2') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style2') ? 'checked' : '' ?> name="layout" value="style2" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style2.png') ?>">
                        </label>
                    </div>
                </div> 

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style3') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style3') ? 'checked' : '' ?> name="layout" value="style3" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style3.png') ?>">
                        </label>
                    </div>
                </div> 
          

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style4') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style4') ? 'checked' : '' ?> name="layout" value="style4" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style4.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style5') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style5') ? 'checked' : '' ?> name="layout" value="style5" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style5.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style6') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style6') ? 'checked' : '' ?> name="layout" value="style6" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style6.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style7') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style7') ? 'checked' : '' ?> name="layout" value="style7" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style7.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style9') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style9') ? 'checked' : '' ?> name="layout" value="style9" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style9.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style10') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style10') ? 'checked' : '' ?> name="layout" value="style10" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style10.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style11') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style11') ? 'checked' : '' ?> name="layout" value="style11" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style11.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style16') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style16') ? 'checked' : '' ?> name="layout" value="style16" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style16.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style17') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style17') ? 'checked' : '' ?> name="layout" value="style17" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style17.png') ?>">
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style18') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style18') ? 'checked' : '' ?> name="layout" value="style18" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style18.png') ?>">
                        </label>
                    </div>
                </div>

               
         <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style19') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style19') ? 'checked' : '' ?> name="layout" value="style19" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style19.png') ?>">
                        </label>
                    </div>
                </div> 


                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style20') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style20') ? 'checked' : '' ?> name="layout" value="style20" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style20.png') ?>">
                        </label>
                    </div>
                </div> 
                

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style21') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style21') ? 'checked' : '' ?> name="layout" value="style21" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style21.png') ?>">
                        </label>
                    </div>
                </div> 

                
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style21') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style21') ? 'checked' : '' ?> name="layout" value="style21" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style21.png') ?>">
                        </label>
                    </div>
                </div> 

                
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style22') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style22') ? 'checked' : '' ?> name="layout" value="style22" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style22.png') ?>">
                        </label>
                    </div>
                </div> 
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style23') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style23') ? 'checked' : '' ?> name="layout" value="style23" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style23.png') ?>">
                        </label>
                    </div>
                </div> 

                
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style24') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style24') ? 'checked' : '' ?> name="layout" value="style24" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style24.png') ?>">
                        </label>
                    </div>
                </div> 

                
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style25') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style25') ? 'checked' : '' ?> name="layout" value="style25" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style25.png') ?>">
                        </label>
                    </div>
                </div> 
            </div>
          </div>

        </div>
      </div>
      <?php endif; ?>

      
      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Templates </h3>
          </div>
      
          <div class="col-md-12">
            <div class="row layrow">
              <?php for ($i=6; $i <=5; $i++): ?>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style'.$i) ? 'active' : '' ?>">
                        <?php if ($i == 9): ?>
                          <span class="new-ribbon">New</span>
                        <?php endif ?>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style'.$i) ? 'checked' : '' ?> name="layout" value="style<?php echo $i; ?>" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style'.$i.'.png') ?>">
                        </label>
                    </div>
                </div> 
              <?php endfor; ?>
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Choose Fonts & Colors</h3>
          </div>
          
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/profile/update_fonts') ?>" role="form" class="form-horizontal">

          <div class="col-md-12 mt-0 mb-20">
            <div class="row layrow">
              <div class="col-md-6">
                  <div class="form-group m-t-10">
                    <label>Select Font</label>
                    <select class="form-control" name="site_font">
                      <?php foreach ($fonts as $fon): ?>
                        <option value="<?php echo $fon->id; ?>" <?php echo (user()->site_font == $fon->id) ? 'selected' : ''; ?>><?php echo ucfirst($fon->name); ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group m-t-10 ">
                      <label>Site Color</label>
                      <span class="color" style="background: #<?php echo html_escape($user->site_color); ?>"></span><br>
                      
                      <input type="text" name="site_color" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->site_color); ?>">
                  </div>
              </div>
            
              <div class="col-md-6">
                  <div class="form-group m-t-10 ">
                      <label>Gradient Background Left Color</label>
                      <input type="text" name="gd_color1" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color1); ?>">
                  </div>

                  <div class="form-group m-t-10 ">
                      <label>Gradient Background Right Color</label>
                      <input type="text" name="gd_color2" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color2); ?>">
                  </div>
                  <span class="color" style="width: 100%; background: linear-gradient(90deg, <?php echo html_escape($user->gd_color1); ?> 0%, <?php echo html_escape($user->gd_color2); ?> 100%);"></span><br>
              </div>

              <!-- csrf token -->
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              
              <div class="col-md-12" style="padding-left: 17px">
                <button type="submit" class="btn btn-info waves-effect w-md waves-light m-b-5"><i class="fa fa-check"></i> Save Changes</button>
              </div>
            </div>
          </div>

          </form>

        </div>
      </div>

    </div>

  </section>

</div>
<style>
 . layout-box.active:default{
  
    border: 6px solid rgb(36 190 128);
    border-radius: 10px;
}
 
  </style>