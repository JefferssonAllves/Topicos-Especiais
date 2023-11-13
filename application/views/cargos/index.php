<?php $this->load->view('layout/header.php') ?>

<style>
    ::-webkit-scrollbar {
        display: none;
    }
</style>

<div class="page-wrap">
    <?php $this->load->view('layout/sidebar.php') ?>
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8 157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z"></path>
                        </svg>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-dark"></i>
                            <div class="d-inline">
                                <h5>Cargos</h5>
                                <span>Cargos cadastrados no sistema</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url() ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Cadastro</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cargos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Fim do cabeçalho -->
            <div class="card">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inserirCargo">
                        + Novo Cargo
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="inserirCargo" tabindex="-1" role="dialog" aria-labelledby="inserirCargoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Novo Cargo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Início do formulário -->
                                <form id='form' action="<?php echo base_url($this->router->fetch_class() . '/insert/'); ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="cargcodigo">Codigo: <span class='text-danger'>*</span></label>
                                                <input type="text" class="form-control" id="cargcodigo" name="cargcodigo" placeholder="Ex: 154" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="cargdescricao">Descricao: <span class='text-danger'>*</span></label>
                                                <input type="text" class="form-control" id="cargdescricao" name="cargdescricao" placeholder="Ex: Programador" required>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fim do formulário -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success" form='form'>Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Descrição</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cargos as $cargo) : ?>
                                <tr>
                                    <!-- Início do modal viewcargo -->
                                    <div class="modal fade" id="modalviewcargo<?php echo $cargo->cargid; ?>" tabindex="-1" role="dialog" aria-labelledby="modalviewcargoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">cargo: <?php echo $cargo->cargdescricao; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" id="viewcargo" name="viewcargo">
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="form-group">
                                                                        <label for="cargcodigo">CPF:</label>
                                                                        <input type="text" class="form-control" id="cargcodigo" name="cargcodigo" value="<?php echo $cargo->cargcodigo; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="clieDataNascimento">Data de nascimento:</label>
                                                                        <input type="date" class="form-control" id="clieDataNascimento" name="clieDataNascimento" value="<?php echo $cargo->clieDataNascimento; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim do modal viewcargo -->
                                    <!-- Início do modal editcargo -->
                                    <div class="modal fade" id="editcargo<?php echo $cargo->cargid; ?>" tabindex="-1" role="dialog" aria-labelledby="editcargoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Alterar cargo: <?php echo $cargo->cargdescricao; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" id="editcargo" name="editcargo" action="<?php echo base_url($this->router->fetch_class() . '/edit/'); ?>" method="POST">
                                                            <div class="form-group">
                                                                <label for="cargdescricao">Nome: <span class='text-danger'>*</span></label>
                                                                <input type="text" class="form-control" id="cargdescricao" name="cargdescricao" placeholder="Ex: Gustavo Almeida" value="<?php echo $cargo->cargdescricao; ?>" required>
                                                            </div>
                                                            <!-- Identificador do cargo -->
                                                            <input type="hidden" class="form-control" id="cargid" name="cargid" placeholder="Ex: Gustavo Almeida" value="<?php echo $cargo->cargid; ?>" required>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="form-group">
                                                                        <label for="cargcodigo">CPF: <span class='text-danger'>*</span></label>
                                                                        <input type="text" class="form-control" id="cargcodigo" name="cargcodigo" placeholder="Ex: 111.222.333-44" value="<?php echo $cargo->cargcodigo; ?>" required>
                                                                    </div>
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                                <button type="submit" class="btn btn-success mr-2">Salvar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim do modal editcargo -->
                                    <!-- Início do modal deletecargo -->
                                    <div class="modal fade" id="modalDeletecargo<?php echo $cargo->cargid; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDeletecargoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir o cargo: <?php echo $cargo->cargdescricao; ?> ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="forms-sample" id="deletecargo" name="deletecargo" action="<?php echo base_url($this->router->fetch_class() . '/delete/'); ?>" method="POST">
                                                            <input type="hidden" class="form-control" id="cargid" name="cargid" value="<?php echo $cargo->cargid; ?>" required>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                                            <button type="submit" class="btn btn-success">Sim</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fim do modal deletecargo -->
                                    <td><?php echo $cargo->cargid; ?></td>
                                    <td><?php echo $cargo->cargdescricao; ?></td>
                                    <td><?php echo $cargo->cargcodigo; ?></td>

                                    <td>
                                        <div class="table-actions">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalviewcargo<?php echo $cargo->cargid; ?>">
                                                <i class="ik ik-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editcargo<?php echo $cargo->cargid; ?>">
                                                <i class="ik ik-edit-2"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="# <?php echo $cargo->cargid; ?>">
                                                <i class="ik ik-trash-2"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (!$cargos) : ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger" role="alert">
                                            Nenhum cargo cadastrado!
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layout/footer.php') ?>