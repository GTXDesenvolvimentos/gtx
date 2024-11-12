<div class="container-fluid">

    <div class="container-fluid mt-2 p-2">
        <div class="row mt-1">
            <div class="col-12 p-0">
                <div class="col-12">
                    <h5 class="mb-0 py-1">Etapas</h5>
                </div>
                <div class="col-12 p-0">
                    <a href="#!" class="btn btn-sm btn-success btn-lg toolbar" data-toggle="modal" data-target="#ModalEtapas">ADICIONAR VENDA (EM DESENVOLVIMENTO)</a>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="pagamentos" data-toolbar=".toolbar" toobar data-toggle="table" data-flat="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-show-export="true" data-page-list="[2, 5, 25, 50, 100, ALL]" data-show-toggle="true" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-click-to-select="true" data-minimum-count-columns="2" data-show-pagination-switch="true" data-mobile-responsive="true" data-url="<?= base_url('/PagamentoController/retCompas') ?>">
                                <thead class="thead-dark">
                                    <tr>
                                        <th data-field="id" data-halign="center" data-align="center" data-sortable="true">Pedido</th>
                                        <th data-field="comprador" data-halign="center" data-align="left" data-sortable="true">Comprador</th>
                                        <th data-field="cpf" data-halign="center" data-align="left" data-sortable="true">CPF</th>
                                        <th data-field="qtde" data-halign="center" data-align="center" data-sortable="true">Quantidade</th>
                                        <th data-field="horas" data-halign="center" data-align="center" data-sortable="true">H | Entrega</th>
                                        <th data-field="retira" data-halign="left" data-align="center" data-sortable="true">Retirar por:</th>
                                        <th data-field="contato" data-halign="center" data-align="center" data-sortable="true">Contato</th>
                                        <th data-field="vtotal" data-halign="center" data-align="center" data-sortable="true">Valor</th>
                                        <th data-field="obs" data-halign="center" data-align="left" data-sortable="true">Obs</th>
                                        <!-- <th data-field="nomeProjeto" data-halign="center" data-align="left" data-sortable="true">Contato</th> -->
                                        <th data-field="pagamento" data-halign="center" data-align="center" data-sortable="true" data-formatter="situacao">Pagamento</th>
                                        <!-- <th data-field="dtEntregaEtapa" data-halign="center" data-align="center" data-sortable="true">Data final prevista</th> -->
                                        <th data-halign="center" data-field="id" class="" data-align="center" data-formatter="opcoes">opções</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>