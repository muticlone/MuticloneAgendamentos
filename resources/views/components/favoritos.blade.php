<div>
    @props(['value'=>'0'])
    @auth
        <input type="checkbox" id="coracao" name="favoritos" value="{{ $value }}" />
        <label for="coracao">
            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="none"
                stroke="black">
                <mask id="heart-mask">
                    <path fill="white" stroke="black" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </mask>
                <path id="heart-path" fill="transparent" stroke="black" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </label>
    @endauth
    <style>
        label {
            cursor: pointer;
        }

        #coracao {
            display: none;
        }

        #heart-path {
            mask: url(#heart-mask);
            transition: fill 2s ease-in-out;
        }

        #coracao:checked+label #heart-path {
            fill: red;
        }
    </style>
    <input type="checkbox" id="coracao" name="favoritos" value="0" />

    <script>
        const checkbox = document.getElementById("coracao");

        // Verifique o valor do atributo 'value' do checkbox e defina o estado inicial
        if (checkbox.value === "1") {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }



        // Adicione um ouvinte de evento "click" para inverter o valor do checkbox
        checkbox.addEventListener("click", function() {
            if (checkbox.value === "0") {
                checkbox.value = "1";
            } else {
                checkbox.value = "0";
            }


        });
    </script>
    <script>
        document.getElementById('coracao').addEventListener('change', function() {
          if (this.checked) {
            document.getElementById('FormularioProdutoFavorito').submit();
          }
        });
        </script>


</div>
