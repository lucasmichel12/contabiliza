
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
<script src="<?=URL;?>public/jquery/jquery.min.js"></script>
<script src="<?=URL;?>public/jquery/jquery.flot.js"></script>
<script src="<?=URL;?>public/jquery/jquery.flot.pie.js"></script>
<script src="<?=URL;?>public/jquery/inputmask.js"></script>
<script src="<?=URL;?>public/popper/popper.min.js"></script>
<script src="<?=URL;?>public/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=URL;?>public/jquery/jqueryMatchHeight.min.js"></script>
<script src="<?=URL;?>public/js/main.js"></script>
<script src="<?=URL;?>public/js/custom.js"></script>

<!-- Plugins de validação de formulários -->
<script src="<?=URL;?>public/jquery/jquery.mask.min.js"></script>
<script src="<?=URL;?>public/js/forms/jquery.validate.js"></script>
<script src="<?=URL;?>public/js/forms/messages_pt_BR.js"></script>
<script src="<?=URL;?>public/js/forms/methods_pt.js"></script>
<script src="<?=URL;?>public/jquery/jqueryMaskMoney.min.js"></script>  

<script>
   $(document).ready(function () {
    $('.phone').mask('(99)9999-9999');
    $('.cel').mask('(99)99999-9999');
    $(".cpf").mask("999.999.999-99");
    $('.cep').mask('99999-999');
    $('.data').mask('99/99/9999');
    $('.dinheiro').mask("#.##0,00", { reverse: true });
  });
</script>

</body>





