<div class="container-fluid">
    <div class="row">

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Validation library file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script>
    $(function() {
        // Adding form validation
        //$('#frm-add-user').validate();
        // Ajax form submission with image
        $('#frm-add-user').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // OR var formData = $(this).serialize();
            //We can add more values to form data
            //formData.append("key", "value");
            $.ajax({
                url: "<?php echo site_url('/MembrosController/cadMembros'); ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (data.cod == 2) {
                        Swal.fire({
                            icon: "info",
                            title: "Oops...",
                            html: '' + data.msg + '',
                            confirmButtonColor: "#198754",
                            confirmButtonText: "Voltar"
                        });
                    } else {
                        //$("#frm-add-user").trigger('reset');
                        Swal.fire({
                            icon: "success",
                            title: "Sucesso!",
                            html: '' + data.msg + '',
                            confirmButtonColor: "#198754",
                            confirmButtonText: "Ok"
                        });
                    }
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "Aguarde...",
                        text: "Enviando os dados",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        });
    });

    $("#txtCpf").mask("000.000.000-00");
    $("#telefone").mask("(00) 0000-0000");
    $("#txtDtnasc").mask("00/00/0000");
    $("#txtAdmissao").mask("00/00/0000");
    $("#txtDtBatismo").mask("00/00/0000");
    $("#txtDtConsa").mask("(00/00/0000");
    $("#txtContato").mask("(00) 00000-0000");

    function validaCPF(cpf) {
        $.ajax({
            url: "<?php echo site_url('/MembrosController/validaCPF'); ?>",
            type: "POST",
            cache: false,
            data: {
                cpf: cpf
            },
            dataType: "JSON",
            success: function(data) {
                if (data.cod == 2) {
                    Swal.fire({
                        icon: "info",
                        title: "Oops...",
                        html: '' + data.msg + '',
                        confirmButtonColor: "#198754",
                        confirmButtonText: "Voltar"
                    });
                } else {
                    Swal.fire({
                        timer: 100,
                        title: "Aguarde...",
                        text: "Consultando CPF",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                }
            },
            beforeSend: function() {
                Swal.fire({
                    title: "Aguarde...",
                    text: "Consultando CPF",
                    imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                    showConfirmButton: false,
                });
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    }

    function validaCEP(cep) {
        var cep = cep.replace(/[^0-9]/, '');
        if (cep) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            $.ajax({
                url: url,
                dataType: 'json',
                crossDomain: true,
                contentType: "application/json",
                success: function(json) {

                    Swal.fire({
                        timer: 100,
                        title: "Aguarde...",
                        text: "Consultando CEP",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });

                    if (json.logradouro) {
                        $("#txtLogradouro").val(json.logradouro);
                        $("#txtBairro").val(json.bairro);
                        $("#txtCidade").val(json.localidade);
                        $("#txtUF").val(json.uf);
                    }
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "Aguarde...",
                        text: "Consultando CEP",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                },
            });
        }

    }
</script>




<script>
    $(function() {
        $('#frmPedidos').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // OR var formData = $(this).serialize();
            //We can add more values to form data
            //formData.append("key", "value");
            $.ajax({
                url: "<?php echo site_url('/VendasController/cadPedidos'); ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {

                    Swal.fire({
                        timer: 100,
                        title: "Aguarde...",
                        text: "Enviando os dados",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                    console.log(data);
                    if (data.cod == 2) {

                        Swal.fire({
                            icon: "info",
                            title: "Oops...",
                            html: '' + data.msg + '',
                            confirmButtonColor: "#198754",
                            confirmButtonText: "Voltar"
                        });
                    } else {
                        $("#frmPedidos").trigger('reset');
                        $('#imgQrcode').html('<img class="rounded img-thumbnail" src="' + data.img + '">');
                        $('#copCola').html('<textarea class="form-control" rows="3" id="cola">' + data.cola + '</textarea>');
                        $('#btnPag').html('<button class="btn btn-success mt-2" id="copyCola" onclick="copiarTexto(`' + data.cola + '`)">Copiar chave de pagamento</button>');

                        $(function() {
                            var staticBackdrop = document.getElementById('staticBackdrop');
                            var myModal = new bootstrap.Modal(staticBackdrop);
                            myModal.show();
                        });
                    }
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "Aguarde...",
                        text: "Enviando os dados",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        });
    });

    $(function() {
        $('#frmDoacao').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            // OR var formData = $(this).serialize();
            //We can add more values to form data
            //formData.append("key", "value");
            $.ajax({
                url: "<?php echo site_url('/DoacaoController/cadDoacao'); ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {

                    Swal.fire({
                        timer: 100,
                        title: "Aguarde...",
                        text: "Enviando os dados",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                    console.log(data);
                    if (data.cod == 2) {

                        Swal.fire({
                            icon: "info",
                            title: "Oops...",
                            html: '' + data.msg + '',
                            confirmButtonColor: "#198754",
                            confirmButtonText: "Voltar"
                        });
                    } else {
                        $("#frmPedidos").trigger('reset');
                        $('#imgQrcode').html('<img class="rounded img-thumbnail" src="' + data.img + '">');
                        $('#copCola').html('<textarea class="form-control" rows="3" id="cola">' + data.cola + '</textarea>');
                        $('#btnPag').html('<button class="btn btn-success mt-2" id="copyCola" onclick="copiarTexto(`' + data.cola + '`)">Copiar chave de pagamento</button>');

                        $(function() {
                            var staticBackdrop = document.getElementById('staticBackdrop');
                            var myModal = new bootstrap.Modal(staticBackdrop);
                            myModal.show();
                        });
                    }
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "Aguarde...",
                        text: "Enviando os dados",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        });
    });



    function copiarTexto() {
        var textoCopiado = document.getElementById("cola");
        textoCopiado.select();
        textoCopiado.setSelectionRange(0, 99999); /* Para mobile */
        document.execCommand("copy");
        $('#copyCola').removeClass("btn-success");
        $('#copyCola').addClass("btn-outline-warning");
    }

    function copiarTexto2() {
        var textoCopiado = document.getElementById("cola2");
        textoCopiado.select();
        textoCopiado.setSelectionRange(0, 99999); /* Para mobile */
        document.execCommand("copy");
        $('#copyCola2').removeClass("btn-danger");
        $('#copyCola2').addClass("btn-outline-warning");
    }

    function copiarTexto3() {
        var textoCopiado = document.getElementById("cola3");
        textoCopiado.select();
        textoCopiado.setSelectionRange(0, 99999); /* Para mobile */
        document.execCommand("copy");
        $('#copyCola3').removeClass("btn-warning");
        $('#copyCola3').addClass("btn-outline-success");
    }


    function vendasMenu() {
        window.location.href = "<?php echo base_url('vendasmenu'); ?>";
    }

    function buscaPedido() {
        var cpf = $('#txtCpf').val();
        $.ajax({
            url: "<?php echo site_url('/VendasController/buscaPedido'); ?>",
            type: "POST",
            cache: false,
            data: {
                cpf: cpf
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                if (data.cod == 2) {
                    Swal.fire({
                        icon: "info",
                        title: "Oops...",
                        html: '' + data.msg + '',
                        confirmButtonColor: "#198754",
                        confirmButtonText: "Voltar"
                    });
                } else {
                    Swal.fire({
                        timer: 100,
                        title: "Aguarde...",
                        text: "Consultando CPF",
                        imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                        showConfirmButton: false,
                    });
                }
            },
            beforeSend: function() {
                Swal.fire({
                    title: "Aguarde...",
                    text: "Consultando CPF",
                    imageUrl: "<?php echo base_url('/assets/img/loader.gif'); ?>",
                    showConfirmButton: false,
                });
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });

    }

    function countQtde(value) {
        if (parseInt(value) > 0) {
            $('#tableCount').removeClass('d-none');
            $('#contQtde').text(value);
            $('#contVunit').text('R$ 45,00');
            varqtde = parseFloat(value);
            vunit = parseFloat(45.00);
            vtotal = parseFloat(vunit * varqtde);
            dinheiro = vtotal.toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#contVtotal').text(dinheiro);
        } else {
            Swal.fire({
                icon: "info",
                title: "Oi...",
                html: 'Você precisa informa a quantidade!',
                confirmButtonColor: "#198754",
                confirmButtonText: "ok"
            });

        }
    }



</script>




<p class="fw-lighter text-center fs-6 m-0">Desenvolvido por Márcio Silva</p>
<p class="fw-lighter text-center fs-6 m-0">GTXSoftware</p>
</body>

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/locale/bootstrap-table-pt-BR.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

</html>