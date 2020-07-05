
</main>
<footer class="site-footer bg-white shadow-top">
        <div class="footer-inner">
            <div class="row">
                <div class="col-12 text-center font-600">
                    &copy; 2020 - Todos os direitos reservados | Desenvolvido por Larissa Carvalho e Lucas Michel
                </div>
                <!-- <div class="col-sm-6 text-right">
                    Design<a href="#"> Larissa</a>
                </div> -->
            </div>
        </div>
</footer>
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="<?=URL;?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.4-beta.33/inputmask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.js"></script>
<!-- <script src="<?=URL;?>public/jquery/jquery.min.js"></script> -->
<!-- <script src="<?=URL;?>public/jquery/jquery.flot.js"></script>
<script src="<?=URL;?>public/jquery/jquery.flot.pie.js"></script> -->
<!-- <script src="<?=URL;?>public/jquery/inputmask.js"></script> -->
<!-- <script src="<?=URL;?>public/jquery/jqueryMaskMoney.min.js"></script>    -->
<script src="<?=URL;?>public/popper/popper.min.js"></script>
<script src="<?=URL;?>public/jquery/jqueryMatchHeight.min.js"></script>
<script src="<?=URL;?>public/js/main.js"></script>
<script src="<?=URL;?>public/js/custom.js"></script>  

<script> 
$(document).ready(function(){
    $("#money").inputmask('decimal', {
                'alias': 'numeric',
                'groupSeparator': ',',
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ".",
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': 'R$ ',
                'placeholder': ''
    });
</script>
</body>





