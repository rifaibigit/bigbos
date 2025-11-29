    <!--==========================
      Footer
    ============================-->
    <footer id="footer">
      <div class="container">
        <div class="copyright" style="color:white;">
          <center>
          Copyright &copy;2021 PT. Bintang Inter Global All rights reserved.
          </center>
          
        </div>
      </div>
    </footer><!-- #footer -->
  </main>
</div>  
<!-- ./wrapper -->

<style>
    #topbar .contact-info .fa-whatsapp {
      padding-left: 20px;
      margin-left: 20px;
      border-left: 1px solid #e9e9e9;
    }
    #topbar .contact-info .fa-clock-o {
      padding-left: 20px;
      margin-left: 20px;
      border-left: 1px solid #e9e9e9;
    }
    #footer { 
      background-image: url("<?= base_url; ?>/dist/img/footer.jpg"); 
      margin: auto;
    }
</style>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6285310212345", // WhatsApp number
            call_to_action: "Halo! Tanya yuk!", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script> -->

<!-- <script type="text/javascript">
    $('.translation-links a').click(function() {
      var lang = $(this).data('lang');
      var $frame = $('.goog-te-menu-frame:first');
      if (!$frame.size()) {
        alert("Error: Could not find Google translate frame.");
        return false;
      }
      $frame.contents().find('.goog-te-menu2-item span.text:contains('+lang+')').get(0).click();
      return false;
    });
</script> -->
            
</body>
</html>
