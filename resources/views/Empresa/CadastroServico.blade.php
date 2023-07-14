@extends('Layout.main')
@section('logo','logo_cadastro.png')
@section('title','Cadastrar Empresa')

@section('conteudo')

<div class="col-md-8 offset-md-2 pt-5"> 
    <form action="/cadastrar/servico/{{$empresa->id}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="row g-12">

            <div class="col-lg-12 col-sm-12 col-md-12 pt-2"  align = "center"> 
                <img src="/img/logo_empresas/{{ $empresa->image}}" class="img-fluid  img_edit" alt="{{$empresa->razaoSocial}}">
            </div>
            
            <div class="alert alert-light" role="alert" align = "center">
                Cradastrar novo serviço {{strtolower($empresa->nomeFantasia)}}
            </div>
            {{-- imagem para o serviço --}}
            <div class="form-group">
                <label for="formFile" class="form-label">Adicionar uma imagem para o serviço:</label>
                <input class="form-control" type="file" id="imageservico" name="imageservico" required>
               
            </div>
           
            {{-- nome do serviço --}}
            <div class="col-lg-8 col-sm-12 col-md-12 pt-2"> 
                <label for="title">
                               
                    Nome
                    
        
                </label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                                
                        <svg 
                            data-bs-toggle="tooltip" data-bs-placement="bottom" 
                            data-bs-title="Digite o nome do serviço"
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                            <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                          </svg>
                    </span>
                    <input type ="text" class="form-control" id="NomeServico" name="nomeServico"
                    placeholder ="Nome do serviço" 
                  
                    aria-describedby="validationTooltipUsernamePrepend"
                    required/>
                    <div class="invalid-tooltip">
                        Por favor, digite o nome do serviço
                    </div>
                </div>
               
            </div>
           
            {{-- valor do serviço --}}
            <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
                <label for="title">Valor</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> 
                        <svg
                            data-bs-toggle="tooltip" data-bs-placement="bottom" 
                            data-bs-title="Digite valor de serviço" 
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                          </svg>
                    </span>
                    
                    <input type="number" class="form-control" id="valorDoServico" name="valorDoServico"
                    placeholder ="Valor" 
                  
                    aria-describedby="validationTooltipUsernamePrepend"
                    required/>
                    <div class="invalid-tooltip">
                        Por favor, digite o valor do serviço
                    </div>
                </div>

            </div>

            {{-- formas de pagamento--}}
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                      
                     <label for="title">Formas de pagamento</label>
                    <div class="form-check">
                        
                        <input class="form-check-input" type="checkbox" value="Dinheiro" name="formaDePagamento[]" id="flexCheckDefault"checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                              </svg> 
                          Dinheiro
                        </label>
                     </div>
               

                
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="pix" id="flexCheckChecked" >
                            <label class="form-check-label">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                  </svg>
                                Pix
                            </label>
                        </div>
                
                  
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="Cartão de débito" >
                        <label class="form-check-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card align-middle" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                            </svg>
                            Cartão de débito
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="Cartão de crédito" id="flexCheckChecked" >
                        <label class="form-check-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
                              </svg>
                            Cartão de crédito
                        </label>
                      </div>
                
                


            </div>

            {{-- forma de pagamento--}}
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                <label for="title"></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="pix" id="flexCheckChecked" >
                        <label class="form-check-label">

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                              </svg>
                            Boleto
                        </label>
                    </div>
            
              
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="formaDePagamento[]" value="Cartão de débito" >
                    <label class="form-check-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                            <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                        Vale-refeição
                    </label>
                </div>

                
            
            


            </div>

            {{-- horário inicial para o atendimento --}}
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                <label for="title">horário inicial para o atendimento </label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> 
                        <svg
                            data-bs-toggle="tooltip" data-bs-placement="bottom" 
                            data-bs-title="Digite o horário de início do atendimento para esse serviço"  
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                            <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                            <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                          </svg>
                    </span>
                    <input type="time" class="form-control" name="horario_incial_atedimento"
                    aria-describedby="validationTooltipUsernamePrepend"
                    required/>
                    <div class="invalid-tooltip">
                         Digite o horário de início do atendimento para esse serviço
                    </div>
                </div>
            </div>

            {{-- horário final para o atendimento --}}
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                <label for="title">horário final de atendimento</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> 
                        <svg
                            data-bs-toggle="tooltip" data-bs-placement="bottom" 
                            data-bs-title="Digite último horário disponível para esse serviço"  
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                            <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                            <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                          </svg>
                    </span>
                    <input type="time" class="form-control" name="horario_final_atedimento"
                    aria-describedby="validationTooltipUsernamePrepend"
                    required/>
                    <div class="invalid-tooltip">
                        Por favor, digite último horário disponível para esse serviço
                    </div>
                </div>
            </div>

            {{-- Duração estimada: --}}
            <div class="col-lg-4 col-sm-12 col-md-12 pt-4"> 
                <label for="duracao">Duração estimada </label>
                <div class="row">
                    
                <div class="col-sm-6">
                    <select class="form-select" id="horas" name="duracaohoras" required>
                    <option value="">Horas</option>
                    <option value="1">1 hora</option>
                    <option value="2">2 horas</option>
                    <option value="3">3 horas</option>
                    <option value="4">4 horas</option>
                    <option value="5">5 horas</option>
                    <option value="6">6 horas</option>
                    <option value="7">7 horas</option>
                    <option value="8">8 horas</option>
                    <option value="9">9 horas</option>
                    <option value="10">10 horas</option>
                    <option value="11">11 horas</option>
                    <option value="12">12 horas</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <select class="form-select" id="minutos" name="duracaominutos" required>
                    <option value="">Minutos</option>
                    <option value="5">5 minutos</option>
                    <option value="10">10 minutos</option>
                    <option value="15">15 minutos</option>
                    <option value="20">20 minutos</option>
                    <option value="30">30 minutos</option>
                    <option value="35">35 minutos</option>
                    <option value="40">40 minutos</option>
                    <option value="45">45 minutos</option>
                    <option value="50">50 minutos</option>
                    <option value="51">50 minutos</option>
                    <!-- Adicione mais opções de minutos conforme necessário -->
                    </select>
                </div>
                </div>
    
               
            </div>

            {{-- Descrição --}}
            <div class="col-lg-12 col-sm-12 col-md-12 pt-3 "> 
                <label for="exampleFormControlTextarea1" class="form-label">Descrição </label>
                <div class="form-group">
                  
                    <div class="input-group mb-3"> 
                        <span class="input-group-text">
                            <svg
                                data-bs-toggle="tooltip" data-bs-placement="bottom" 
                                data-bs-title="Digite uma descrição sobre o serviço" 
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
                              </svg>
                        </span>
                        <textarea class="form-control" name="descricaosevico" rows="3"
                        placeholder="Descrição sobre seu negócio" minlength="15" maxlength="250" 
                        aria-describedby="validationTooltipUsernamePrepend"
                    
                        required ></textarea>
                        <div class="invalid-tooltip ">
                            Por favor, digite uma breve descrição sobre o serviço de mo minimo quize caracteres 

                        </div>
                    </div>
                

                </div>
                </div>
            
           
            </div>

        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 pt-2  "align="center"> 
            <button  type="submit" class="btn btn-primary">Salvar</button>
        </div>
        
    </form>
    
    
</div>


@endsection

