
    <section class="section-padding" style="background-color:white;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-lext">
                        <?php if (isset($page_title) && $page_title == 'privacy_policy'): ?>
                            <h3 class="title" style="background-image: url('<?php echo base_url() ?>assets/images/bgimage.png'); background-position: left top; height:150px;padding:50px; color:white; font-size:50px;">Privacy Policy</h3>
                            <h5 class="heading" style="color:black; font-size:30px;">USER AGREEMENT</h5>
                            <div class="desc" style="font-weight:normal; text-align:justify; font-size:15px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus nesciunt officia nam aliquam! Totam nisi veniam excepturi porro cumque sed aliquam perspiciatis suscipit, doloribus modi expedita ipsam tempore perferendis tenetur voluptatum voluptatibus blanditiis! Minima placeat eligendi tempore, quia autem, voluptates adipisci assumenda inventore suscipit laudantium, dolorum alias culpa est doloribus?
</div>
                        <?php else: ?>
                            <h3 class="title"><?php echo html_escape($page_name) ?></h3>
                            <div class="desc"><?php echo $page->details ?></div>
                        <?php endif ?>
                        <div class="space-200"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    