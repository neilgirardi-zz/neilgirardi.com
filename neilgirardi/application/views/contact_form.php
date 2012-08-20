<div id="contact-form" class="column rounded pull-left">
    <h1>Send an Email to Neil Girardi</h1>
    <form class="email" action="contact/validate_email" method="post">
        <input type="text" name="email_address" class="rounded grid-6" placeholder="Your e-mail address" />
        <input type="text" name="email_subject" class="rounded grid-6" placeholder="Subject" />
        <textarea name="email_message" class="rounded grid-6" placeholder="Message"></textarea>
        <input type="hidden" name="submitted" value="submitted" />
        <input type="submit" id="send-email" value="Send" class="btn grid-2 rounded" />
    </form>
</div>