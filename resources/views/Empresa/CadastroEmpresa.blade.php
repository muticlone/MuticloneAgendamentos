@extends('Layout.main')
@section('logo', 'logo_cadastro.png')
@section('title', 'Cadastrar Empresa')

@section('conteudo')

    <div class="col-md-8 offset-md-2 pt-4">
        <form action="{{ route('cadastrar.Empresa') }}" method="POST" enctype="multipart/form-data"
            class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="row g-12">
                <div class="alert alert-light" role="alert" align="center">
                    Cadastrar nova empresa
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label">Adicionar logotipo da empresa:</label>
                    <input class="form-control" type="file" id="image" name="image" required>



                </div>
                {{-- <div class="col-lg-12 col-sm-12 col-md-12 pt-2">

                <button type="button" class="btn btn-sm btn-success" id="genelogo"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Escolha uma área de Atuação é digite nome fantasia, depois gere aqui uma descrição automática para o seu negócio"
                >
                <span id="nomelogo" style="margin-right: 10px;">Gere uma logo</span>
                <span id="loadinglogo" style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
                <img id="generatedImage" style="display: none;" alt="Generated Image">




            </div> --}}


                <div class="col-lg-5 col-sm-12 col-md-12 pt-2">


                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input class="form-check-input cursor" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked" onchange="changeInputType()">
                            <label class="form-check-label cursor" for="flexSwitchCheckChecked" id="check">Pessoa
                                Física</label>
                        </div>
                        <label for="title" id="labelCnpj">

                            Cnpj


                        </label>
                        <div class="input-group mb-3 ">
                            <span class="input-group-text " id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite número seu cnpj" xmlns="http://www.w3.org/2000/svg" width="14"
                                    height="14" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="cnpj" name="cnpj_cpf" placeholder="Cnpj"
                                 inputmode="numeric"
                                aria-describedby="validationTooltipUsernamePrepend" required />

                            <div class="invalid-tooltip">
                                Por favor, digite o seu CNPJ OU CPF
                            </div>
                            <script></script>



                        </div>


                    </div>
                </div>


                <div class="col-lg-7 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <div class="form-check form-switch">

                        </div>
                        <label for="title ">

                            Razão Social


                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite a sua razão social" xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" fill="currentColor" class="bi bi-person-circle"
                                    viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="razaoSocial" name="razaoSocial"
                                placeholder="Razão Social" aria-describedby="validationTooltipUsernamePrepend" required />



                            <div class="invalid-tooltip">
                                Por favor, digite sua razão Social
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">

                            Nome Fantasia

                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite o seu nome fantasia. O nome fantasia será o nome padrão nas exibição da sua empresa."
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>

                            </span>
                            <input type="text" class="form-control" id="NomeFantasia" name="nomeFantasia"
                                placeholder="Nome Fantasia" aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite seu nome Fantasia
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">


                            Telefone



                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite o número do telefone da sua empresa"
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                            <input type="tel" class="form-control" id="telefone" name="telefone"
                                placeholder="Telefone" aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite seu número de telefone
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">



                            Celular


                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success colorspancadastrodeempresa" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite o número do celular da sua empresa. Esse número será usado para interações com WhatsApp"
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-whatsapp mx-1" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                                Whatsapp
                            </span>
                            <input type="tel" class="form-control" id="Celular" name="celular"
                                placeholder="Celular"
                                aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite seu número do celular da sua empresa. Esse número será usado para
                                interações com WhatsApp
                            </div>

                        </div>





                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Cep</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite o seu CEP. O endereço da sua empresa será usado para que seus clientes encontrem você."
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-globe-americas" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep"
                                onblur="pesquisacep(this.value);"  aria-describedby="validationTooltipUsernamePrepend" required
                                inputmode="numeric"
                                />
                            <div class="invalid-tooltip">
                                Por favor, digite seu número do seu cep
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Logradouro</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite nome da sua rua. O endereço da sua empresa será usado para que seus clientes encontrem você."
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-geo-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="logradouro" name="logradouro"
                                placeholder="Logradouro" required aria-describedby="validationTooltipUsernamePrepend" />
                            <div class="invalid-tooltip">
                                Por favor, digite mome da sua rua
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Complemento:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite o complemento do seu endereço, por exemplo, 'segundo andar sala 325'."
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-geo-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                placeholder="Complemento" />
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Bairro:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite nome do seu bairro." xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" fill="currentColor" class="bi bi-geo-fill"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                placeholder="Bairro" aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite mome do seu bairro
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Cidade:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite nome da sua cidade." xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" fill="currentColor" class="bi bi-geo-fill"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                placeholder="Cidade" aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite mome da sua cidade
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Numero:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite numero do local, caso não tenha use 's/n'"
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-geo-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="numero_endereco" name="numero_endereco"
                                placeholder="N°" aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite numero do local, caso não tenha use 's/n'
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="title">Uf:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">

                                <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-title="Digite a sigla do seu estado, por exemplo, 'BA'."
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-geo-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="uf" name="uf"
                                placeholder="Uf" required aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite a sigla do seu estado, por exemplo, 'BA'.
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">
                    <div class="form-group">
                        <label for="area-atuacao" class="form-label">Área de Atuação</label>
                        <select class="form-select" id="area-atuacao" name="area_atuacao" onchange="mostrarOutro()"
                            required>
                            <option value="">Selecione uma opção</option>
                            <option value="Beleza e Saúde Feminina">Beleza e Saúde Feminina</option>
                            <option value="Barbearia">Barbearia</option>
                            <option value="Costureira">Costureira</option>
                            <option value="Estúdio de tatuagem">Estúdio de tatuagem</option>
                            <option value="Restaurantes">Restaurantes</option>
                            <option value="Advogado">Advogado</option>
                            <option value="Professor(a) particular">Professor(a) particular</option>
                            <option value="Mecânico">Mecânico</option>
                            <option value="Engenheiro">Engenheiro</option>
                            <option value="Jardineiro">Jardineiro</option>
                            <option value="Consultoria">Consultoria</option>
                            <option value="Personal trainers">Personal trainers</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Cuidador de Idosos">Cuidador de Idosos</option>
                            <option value="Limpeza e higienização">Limpeza e higienização</option>
                            <option value="Outro">Outro</option>
                        </select>

                        <div class="col-12 pt-2" id="div-outro" style="display: none;">
                            <div class="form-group">
                                <label for="outra-area">Outras Áreas de Atuação:</label>
                                <input type="text" class="form-control" id="outra-area" name="outra-area"
                                    placeholder="Digite sua Área de Atuação">
                                <input type="hidden" id="area-atuacao-hidden" name="area-atuacao-hidden"
                                    value="">
                            </div>


                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Descrição:

                                </label>

                                <div class="input-group mb-3">

                                    <textarea class="form-control" id="result" name="descricao" rows="3"
                                        placeholder="Descrição sobre seu negócio" minlength="63" maxlength="131"
                                        aria-describedby="validationTooltipUsernamePrepend" required></textarea>


                                    <div class="invalid-tooltip ">
                                        Por favor, digite uma breve descrição sobre o seu negócio de mo minimo sessenta e
                                        três caracteres

                                    </div>
                                </div>


                            </div>
                        </div>
                        {{-- <button type="button" class="btn btn-success" id="generateDescription" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Escolha uma área de Atuação é digite nome fantasia, depois gere aqui uma descrição automática para o seu negócio">
                            <span id="nomeDesci" style="margin-right: 10px;">Gere uma descrição</span>
                            <span id="loadingMessage" style="display: none;" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>

                        </button> --}}



                        <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">


                            <label for="title" class="d-flex align-items-center">Formas de pagamento</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dinheiro"
                                    name="formaDePagamento[]" id="flexCheckDefault" checked>
                                <label class="form-check-label d-flex align-items-center" for="flexCheckDefault">
                                    <x-dinheiro width="20" height="20" margin="5px" />
                                    Dinheiro
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="formaDePagamento[]"
                                    value="Pix">
                                <label class="form-check-label d-flex align-items-center">
                                    <x-pix width="20" height="20" margin="5px" />
                                    Pix
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="formaDePagamento[]"
                                    value="Cartão de débito">
                                <label class="form-check-label d-flex align-items-center">
                                    <x-cartao-de-depito width="20" height="20" margin="5px" />
                                    Cartão de débito
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="formaDePagamento[]"
                                    value="Cartão de crédito" id="flexCheckChecked">
                                <label class="form-check-label d-flex align-items-center">
                                    <x-cartao_credito width="20" height="20" margin="5px" />
                                    Cartão de crédito
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="Boleto"
                                    id="flexCheckChecked">
                                <label class="form-check-label d-flex align-items-center">

                                    <x-boleto width="20" height="20" margin="5px" />

                                    Boleto
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="formaDePagamento[]"
                                    value="Vale-refeição">
                                <label class="form-check-label d-flex align-items-center">
                                    <x-vale_refeicao width="20" height="20" margin="5px" />

                                    Vale-refeição
                                </label>
                            </div>






                        </div>
                        <div class="row g-12">
                            <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">
                                <label for="title">Rede Sociais</label>
                            </div>

                            <div class="col-lg-6 col-sm-12 col-md-12 ">

                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-info colorspancadastrodeempresa"
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title="Digite Link do seu perfil no Instagram"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-instagram mx-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                            </svg>
                                            Instagram

                                        </span>
                                        <input type="url" class="form-control" id="instagram" name="instagram"
                                            placeholder="Link do seu perfil" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12 ">

                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-danger colorspancadastrodeempresa"
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title=" Digite link do seu canal no Youtube"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-youtube mx-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                            </svg>
                                            Youtube

                                        </span>
                                        <input type="url" class="form-control" id="youtube" name="youtube"
                                            placeholder="Link do seu canal" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <div class="input-group mb-3 ">
                                        <span class="input-group-text bg-primary colorspancadastrodeempresa"
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title=" Digite link do seu perfil no facebook "
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-facebook mx-1 " viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>
                                            facebook

                                        </span>
                                        <input type="url" class="form-control" id="facebook" name="facebook"
                                            placeholder="Link do seu perfil" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-dark colorspancadastrodeempresa"
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title=" Digite link do seu perfil no TikTok "
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-tiktok mx-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                            </svg>
                                            TikTok

                                        </span>
                                        <input type="url" class="form-control" id="tikTok" name="tikTok"
                                            placeholder="Link do seu perfil" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-secondary colorspancadastrodeempresa "
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title="Digite link do seu site ."
                                                xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" class="bi bi-globe-americas mx-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                                            </svg>
                                            Site
                                        </span>
                                        <input type="url" class="form-control" id="site" name="site"
                                            placeholder="Link do seu Site" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12">

                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary colorspancadastrodeempresa "
                                            id="basic-addon1">
                                            <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title=" Digite link do seu perfil no TikTok "
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-linkedin mx-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                            </svg>
                                            Linkedin

                                        </span>
                                        <input type="url" class="form-control" id="linkedin" name="linkedin"
                                            placeholder="Link do seu perfil" />
                                    </div>

                                </div>

                            </div>




                        </div>





                        <div class="col-lg-12 col-sm-12 col-md-12 pt-4  "align="center">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>


                    </div>


        </form>
    </div>

    <script src="/js/buscacep.js"></script>
    <script src="/js/buscacnpj.js"></script>

    <script src="/js/gbt.js"></script>

    {{-- <script src="/js/img/generateImage.js"></script> --}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    <script>$('#Celular').inputmask("(99) 99999-9999");</script>
    <script>$('#telefone').inputmask("(99) 9999-9999");</script>
    <script>$('#cnpj').inputmask("99.999.999/9999-99");</script>
    <script>$('#cep').inputmask("99999-999");</script>
    <script>
        $('#numero_endereco').inputmask({
          mask: "99999999",
          placeholder: ""
        });

    </script>
    <script>
         $('#uf').inputmask({
          mask: "AA",
          placeholder: ""
        });

    </script>


    </style>
    <script src="/js/Tooltips.js"></script>
@endsection
