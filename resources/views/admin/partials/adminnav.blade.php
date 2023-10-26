<div class="adminNav">
    <div class="sectionDiv">
        <ul>
            <li class="navLink">
                <a href="/" target="_blank"><i class="fa fa-globe mr-4  mt-0.5"></i>Voir le site</a>
            </li>
            <li class="navLink">
                <a href="/admin"><i class="fa fa-home mr-4  mt-0.5"></i>Tableau de bord</a>
            </li>
            <li class="navLink">
                <a href="{{ route('pages.index') }}"><i class="fa fa-file-text mr-4 mt-0.5" aria-hidden="true"></i>Pages</a>
            </li>
            <li class="navLink">
                <a href="{{ route('conversations.index') }}"><i class="far fa-comments mr-4 mt-0.5" aria-hidden="true"></i>Forum</a>
            </li>
            @can('SuperAdmin', App\Models\User::class)
            <li class="navLink">
                <a href="{{ route('users.index') }}"><i class="fa fa-user mr-4 mt-0.5" aria-hidden="true"></i>Utilisateurs</a>
            </li>
            @endcan
            <li class="navLink">
                <a href="/admin/posts"><i class="fa fa-newspaper mr-4 mt-0.5" aria-hidden="true"></i>Posts</a>
            </li>
            <li class="navLink">
                <a href="/admin/events"><i class="fa-solid fa-bell mr-4 mt-0.5" aria-hidden="true"></i>Events</a>
            </li>
            <li class="navLink">
                <a href="{{ route('medias.index') }}"><i class="fa fa-download mr-4 mt-0.5" aria-hidden="true"></i>Médias</a>
            </li>
            <li class="navLink">
                <a href="{{ route('medias.index') }}"><i class='fas fa-key mr-4 mt-0.5' aria-hidden="true"></i>Rôles</a>
            </li>
            <li class="navLink admin__menu__dropdown">
                <a href="Javascript:void(0)"><i class='fa fa-cog mr-4 mt-0.5' aria-hidden="true"></i>Paramêtres</a>
                <div class="admin__menu__dropdown__container">
                    <div class="admin__menu__dropdown__content">
                        <div class="submenu__links">
                            <a href="">PARAM1</a>
                        </div>
                        <div class="submenu__links">
                            <a href="">PARAM1</a>
                        </div>
                        <div class="submenu__links">
                            <a href="">PARAM1</a>
                        </div>

                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="admin__logo">
        <img src="{{ asset('files/logo-webinord-clair.png') }}" alt="">
    </div>
</div>
