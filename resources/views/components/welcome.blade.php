<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- CONTAINER DE SESSOES -->
    @if(auth()->user()->name == 'admin')
        <h2>Você está logado como admin, registre um terapeuta para poder utilizar o sistema.</h2>
    @else
    <div class="row-span-2">
        <div class="p-6 lg:p-8 display-flex flex-ro">
            <div class="icones" style="display: flex; width: 100%; align-items: center;">
                <div style="flex: 1; text-align: end;">
                    <!-- Icone -->
                    <ion-icon name="people-outline" size="large"></ion-icon>
                </div>
                <div style="flex: 1; text-align: center;">
                    <h1>Sessão</h1>
                </div>
                <div style="flex: 1; text-align: start;">
                    <!-- Icone -->
                    <ion-icon name="people-outline" size="large"></ion-icon>
                </div>
            </div>
        </div>
    
        <div class="p-6 lg:p-8 display-flex flex-row bg-white border-b border-gray-200">
            <div class="Botoes" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                <div style="flex: 1;">
                    <a href="/dashboard/s/sregister" class="btn-link">
                        <button type="button" class="btn">Cadastrar Sessão</button>
                    </a>
                </div>
                <div style="flex: 1; text-align: end;">
                    <a href="/dashboard/s/sdelete" class="btn-link"> 
                        <button type="button" class="btn-custom">Deletar Sessão</button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>

    <!-- CONTAINER PACIENTE -->
    <div class="row-span-2">
        <div class="p-6 lg:p-8 display-flex flex-ro">
            <div class="icones" style="display: flex; width: 100%; align-items: center;">
                <div style="flex: 1; text-align: end;">
                    <!-- Icone -->
                    <ion-icon name="accessibility-outline" size="large"></ion-icon>
                </div>
                <div style="flex: 1; text-align: center;">
                    <h1>Paciente</h1>
                </div>
                <div style="flex: 1; text-align: start;">
                    <!-- Icone -->
                    <ion-icon name="accessibility-outline" size="large"></ion-icon>
                </div>
            </div>
        </div>
    
        <div class="p-6 lg:p-8 display-flex flex-row bg-white border-b border-gray-200">
            <div class="Botoes" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                <div style="flex: 1;">
                    <a href="/dashboard/p/pregister" class="btn-link">
                        <button type="button" class="btn">Cadastrar Paciente</button>
                    </a>
                </div>
                <div style="flex: 1; text-align: end;">
                    <a href="/dashboard/p/pdelete">
                        <button type="button" class="btn-custom">Deletar Paciente</button>
                    </a>
                </div>
            </div>
        </div>
        
</div>
    @endif


<style>
    .rotating-cube {
        width: 35px;
        height: 35px;
        background-color: #3498db;
        animation: rotate 2s infinite linear;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        border: 2px solid #3498db;
        background-color: #3498db;
        color: #ffffff;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #2980b9;
    }
    h1 {
        --k: 0;
        place-self: center;
        color: #3498db;
        font: 500 clamp(.875em, 7.25vw, 3em) arial black, sans-serif;
        filter: url(#f);
        text-align: center;
        text-transform: uppercase;
        animation: anime 4s linear infinite;
        font-weight: 500;
    }
    .btn-custom {
        padding: 10px 20px;
        font-size: 16px;
        border: 2px solid #dd0000;
        background-color: #dd0000;
        color: #ffffff;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #990101;

    }

</style>
