<div class="flex justify-center lg:-mx-12 my-12 p-8 md:px-12 bg-gray-100 border border-gray-200 text-sm md:rounded shadow">
    <!-- Begin Mailchimp Signup Form -->
    <div id="mc_embed_signup">
        <form action="https://laravel-news.us17.list-manage.com/subscribe/post?u=e32abc9cc1622d81b1e9308c8&id=cb256d4002" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
                <h2>Iscriviti alla nostra newsletter</h2>
                <div class="mb-2 text-xs">Cliccando Invia accetti la nostra <a href="https://www.iubenda.com/privacy-policy/89440925/legal" target="_blank">Privacy Policy</a>.<br/>Una volta iscritto riceverai una email di conferma.</div>
                <div class="mc-field-group">
                    <label for="mce-EMAIL">Indirizzo email <span class="asterisk">*</span></label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Indirizzo email">
                </div>

                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e32abc9cc1622d81b1e9308c8_cb256d4002" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Invia" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                <div id="mce-responses" class="clear foot pt-6">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            </div>
        </form>
    </div>
    <!--End Mailchimp Signup Form -->
</div>

@push('scripts')
    <script src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
    <script>(function($) {
        window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);
    </script>
@endpush
