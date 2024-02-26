@extends('home')
@section('main')
    <style>
        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        :root {
            --c-action-primary: #2e44ff;
            --c-action-primary-accent: #e9e5ff;
            --c-action-secondary: #e5e5e5;
            --c-text-primary: #0d0f21;
            --c-text-secondary: #6a6b76;
            --c-background-primary: #dfdddd;
        }

        body {
            font-family: "Inter", sans-serif;
            color: var(--c-text-primary);
            background-color: var(--c-background-primary);
            line-height: 1.5;
        }

        input,
        button,
        select,
        textarea {
            font: inherit;
        }

        .modal1 {
            width: 90%;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10vh;
            margin-bottom: 10vh;
            background-color: #FFF;
            border-radius: .5rem;
            box-shadow: 0 5px 15px rgba(#000, .2);
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 1.5rem 1.5rem 1rem;
        }

        .logo-circle {
            width: 3.5rem;
            height: 3.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background-color: var(--c-action-primary-accent);

            svg {
                max-width: 1.5rem;
            }
        }

        .btn-close {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: .25rem;
            border: none;
            background-color: transparent;

            &:hover,
            &:focus {
                background-color: var(--c-action-primary-accent);
            }
        }

        .modal-body {
            padding: 1rem 1.5rem;
        }

        .modal-title {
            font-weight: 700;
        }

        .modal-description {
            color: var(--c-text-secondary);
        }

        .upload-area {
            margin-top: 1.25rem;
            border: none;
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%23ccc' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            background-color: transparent;
            padding: 3rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;

            &:hover,
            &:focus {
                background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%232e44ff' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            }
        }

        .upload-area-icon {
            display: block;
            width: 2.25rem;
            height: 2.25rem;

            svg {
                max-height: 100%;
                max-width: 100%;
            }
        }

        .upload-area-title {
            margin-top: 1rem;
            display: block;
            font-weight: 700;
            color: var(--c-text-primary);
        }

        .upload-area-description {
            display: block;
            color: var(--c-text-secondary);

            strong {
                color: var(--c-action-primary);
                font-weight: 700;
            }
        }

        .modal-footer {
            padding: 1rem 1.5rem 1.5rem;
            display: flex;
            justify-content: flex-end;

            [class*="btn-"] {
                margin-left: .75rem;
            }
        }

        .btn-secondary,
        .btn-primary {
            padding: .5rem 1rem;
            font-weight: 500;
            border: 2px solid var(--c-action-secondary);
            border-radius: .25rem;
            background-color: transparent;
        }

        .btn-primary {
            color: #FFF;
            background-color: var(--c-action-primary);
            border-color: var(--c-action-primary);
        }
    </style>

    <body>
        <div class="modal1">
            <div class="modal-header">
                <div class="modal-logo">
                    <span class="logo-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                            height="419.116" viewBox="0 0 512 419.116">
                            <defs>
                                <clipPath id="clip-folder-new">
                                    <rect width="512" height="419.116" />
                                </clipPath>
                            </defs>
                            <g id="folder-new" clip-path="url(#clip-folder-new)">
                                <path id="Union_1" data-name="Union 1"
                                    d="M16.991,419.116A16.989,16.989,0,0,1,0,402.125V16.991A16.989,16.989,0,0,1,16.991,0H146.124a17,17,0,0,1,10.342,3.513L227.217,57.77H437.805A16.989,16.989,0,0,1,454.8,74.761v53.244h40.213A16.992,16.992,0,0,1,511.6,148.657L454.966,405.222a17,17,0,0,1-16.6,13.332H410.053v.562ZM63.06,384.573H424.722L473.86,161.988H112.2Z"
                                    fill="var(--c-action-primary)" stroke="" stroke-width="1" />
                            </g>
                        </svg>
                    </span>
                </div>
            </div>
            <form action="{{ route('poblar-alumnos') }}" method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <h2 class="modal-title">Carga el archivo Excel</h2>
                    <p class="modal-description">Con extencion "Alumnos.xlsx"</p>
                    <input type="file" name="documento" class="upload-area">

                </div>
                @csrf
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Importar</button>
                </div>
            </form>

        </div>

        @if (session('success'))
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="danger-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    <script src="{{ asset('js/mensajes.js') }}"></script>
    </body>
@endsection

