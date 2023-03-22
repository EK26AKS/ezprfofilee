<section class="section-padding price-section" style="background-image: url('<?php echo base_url() ?>assets/images/bgimage.png'); background-position: left top; height:300px">

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-title">
                    <h2 class="title1 text-white">You are almost done !</h2>

                    <div class="space-20"></div>

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-outline-primary custom-btngp">
                        <input type="radio" name="price_type" value="monthly" class="switch_price"> Monthly
                      </label>
                      <label class="btn btn-outline-primary custom-btngp active">
                        <input type="radio" name="price_type" value="yearly" class="switch_price"> Yearly
                      </label>
                    </div>

                    <div class="space-60"></div>
                </div>
            </div>
        </div>
</section>
<section class="pack">
       <div class="row minh-600">

          <?php $i=1; foreach ($packages as $package): ?>
            <div class="price-col col-md-offset-1 col-sm-12 col-md-<?php echo(12/count($packages)) ?>">
               <div class="pricing-table purple text-center">

                <h1 class="package_title mb-50"><?php echo html_escape($package->name); ?></h1>

                  <!-- Price -->
                  <div class="price-tag mb-20 mt-20">
                     <div class="yearly_price" style="display:none;">
                         <span class="symbol"><?php echo settings()->currency_symbol ?></span>
                         <span class="amount"><?php echo round($package->price); ?></span>
                         <span class="after">/year</span>
                     </div>

                     <div class="monthly_price">
                         <span class="symbol"><?php echo settings()->currency_symbol ?></span>
                         <span class="amount"><?php echo round($package->monthly_price); ?></span>
                         <span class="after">/month</span>
                     </div>
                  </div>

                  
                    <!-- Features -->
                    <div class="pricing-features">
                        <?php if (empty($package->features)): ?>
                          Features not selected !
                        <?php else: ?>
                          <?php foreach ($features as $all_feature): ?>

                            <?php foreach ($package->features as $feature): ?>
                                <?php if ($feature->feature_id == $all_feature->id): ?>
                                    <?php $icon = 'fa fa-check text-success'; break; ?>
                                <?php else: ?>
                                    <?php $icon = 'fa fa-times text-danger'; ?>
                                <?php endif ?>
                            <?php endforeach ?>

                            <div class="feature"><?php echo html_escape($all_feature->name) ?><span><i class="<?php echo $icon; ?>"></i></span></div>
                          <?php endforeach ?>
                        <?php endif ?>
                    </div>
                  <!-- Button -->
                  <a class="price-button package_btn" href="<?php echo base_url('auth/add_package/'.$package->id) ?>">Select</a>
                  <input type="hidden" class="billing_type" name="billing_type" value="yearly">
               </div>
            </div>
          <?php endforeach ?>

       </div>
    </div>
</section><!-- /Pricing Area
