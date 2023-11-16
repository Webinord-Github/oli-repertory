<div class="adminNav__container">
    <div class="adminNav">
        <div class="admin__logo">
            <img src="{{ asset('files/logo-webinord-clair.png') }}" alt="">
        </div>
        <div class="tabs">
            <p class="actif" data-tab="infos">Infos</p>
            <p data-tab="blocs">Blocs</p>
            <p data-tab="options">Options</p>
        </div>
        <div id="infos" class="tab actif">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-wrapper">
                    @if (!$errors->isEmpty())
                    <div role="alert">
                        <div>
                            Empty Fields
                        </div>
                        <div>
                            @foreach ($errors->all() as $message)
                                <ul class="px-4">
                                    <li class="list-disc">{{$message}}</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <input type="hidden" id="body" name="body">
                    <div class="input">
                        <div>
                            <x-label for="title" :value="__('Titre')"></x-label>
                            <x-input id="title" type="text" name="title" :value="old('title')" required autofocus />
                        </div>
                    </div>
                    <div class="input">
                        <div>
                            <x-label for="slug" :value="__('Lien')"></x-label>
                            <x-input id="slug" type="text" name="slug" :value="old('slug')" required autofocus />
                        </div>
                    </div>
                    <div class="input">
                        <div>
                            <x-label for="image" :value="__('Image: jpeg, png, jpg, webp')" />
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="input">
                        <div>
                            <x-label :value="__('Thématiques')"></x-label>
                            @foreach ($thematiques as $thematique)
                                <div class="flex items-center">
                                    <input type="checkbox" id="{{ $thematique->name }}" name="thematiques[]" value="{{ $thematique->id }}">
                                    <label for="{{ $thematique->name }}">{{ ucfirst($thematique->name) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="input">
                        <div>
                            <x-label for="status" :value="__('Status')"></x-label>
                            <select name="status" id="status">
                                <option value="brouillon" @selected('draft' == old('status'))>Brouillon</option>
                                <option value="publié" @selected('publié' == old('status'))>Publié</option>
                                <option value="archivé" @selected('archivé' == old('status'))>Archivé</option>
                            </select>
                        </div>
                    </div>
                    <div class="input">
                        <div>
                            <x-label for="published_at" :value="__('Date de publication')"></x-label>
                            <x-input id="published_at" type="datetime-local" name="published_at" :value="old('published_at')" required autofocus />
                        </div>
                    </div>
                    <div class="input submit">
                        <a href="/admin/posts">Retour</a>
                        <x-button>
                            {{ __('Créer') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
        <div id="blocs" class="tab">
            <div class="bloc" data-bloc="text">
                <div class="item">
                    <i class="fa-solid fa-align-justify"></i>
                    <p>Texte</p>
                </div>
                <div class="content">
                    <div class="text-wrapper">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil possimus minus culpa omnis nostrum quas, quo numquam unde optio a? Quibusdam porro provident, voluptatum expedita ullam illum rem officia blanditiis!</p>
                    </div>
                </div>
            </div>
            <div class="bloc" data-bloc="image">
                <div class="item">
                    <i class="fa-solid fa-image"></i>
                    <p>Image</p>
                </div>
                <div class="content">
                    <div class="img-wrapper">
                        <img src="{{ asset('storage/medias/6fabcd5159ebca87cafc17975f9e9667.jpeg') }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="options" class="tab">
            <div class="default option selected">
                <p>Sélectionner un bloc pour le modifier</p>
                <p><i class="fa-solid fa-turn-up fa-rotate-90"></i></p>
            </div>
            <div class="option margin hidden">
                <div class="margin-wrapper">
                    <p>Margin</p>
                    <div class="tag">
                        <p>Top</p>
                        <p>Left</p>
                        <p>Bottom</p>
                        <p>Right</p>
                    </div>
                    <div class="inputs">
                        <input type="number">
                        <input type="number">
                        <input type="number">
                        <input type="number">
                    </div>
                </div>
            </div>
            <div class="option" data-option="text">
                <div class="w-full mb-2">
                    <div class="flex justify-center flex-col">
                        <x-label :value="__('Contenu')"></x-label>
                        <textarea id="text-editor" style="resize: none; border-radius: 5px;height:100px">{{ old('body') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="option" data-option="image">
                <div class="w-full mb-2">
                    <div class="flex justify-center flex-col">
                        <x-label :value="__('Image: jpeg, png, jpg, webp')" />
                        <input type="file" id="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>