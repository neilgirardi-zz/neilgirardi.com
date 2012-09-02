<div id="site-container" class="full-grid-width centered">
    <div id="contact-container">
        <div id="contact-form" class="column rounded pull-left">
            <h1>Send an Email to Neil Girardi</h1>
            <?php 
            $attributes = array('class' => 'email');
            echo form_open('contact', $attributes); 
            
             if(!form_error('email_address')) {             
                echo form_label('Your email address', 'email_address');
            } else {
                echo form_error('email_address');
            }
            ?>
                <input type="text" name="email_address" value="<?php echo set_value('email_address'); ?>" class="rounded grid-6" />
                
                <?php
                 if(!form_error('email_subject')) {             
                    echo form_label('Subject', 'email_subject');
                } else {
                    echo form_error('email_subject');
                }
                ?>
                <input type="text" name="email_subject" value="<?php echo set_value('email_subject'); ?>" class="rounded grid-6" />
                
                <?php
                 if(!form_error('email_message')) {             
                    echo form_label('Message', 'email_message');
                } else {
                    echo form_error('email_message');
                }
                ?>
                <textarea name="email_message" class="rounded grid-6"><?php echo set_value('email_message'); ?></textarea>
                <input type="hidden" name="submitted" value="submitted" />
                <input type="submit" id="send-email" value="Send" class="btn grid-3 rounded" />
            </form>
        </div>
    </div>