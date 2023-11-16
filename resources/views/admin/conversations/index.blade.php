@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="pagesContainer">
        <h1 class="text-4xl font-bold pb-6">Sujets du forum</h1>
        @if (session('status'))
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-8 my-6" role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
            <a href="{{ route('conversations.create') }}" id="newpage-cta" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               Add New
            </a>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Body</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conversations as $conversation)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            <a href="{{ route('conversations.edit', ['conversation' => $conversation->id]) }}" class="underline">{{ $conversation->title }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $conversation->body }}</td>
                        <td class="px-6 py-4">
                            <div class="relative inline-block text-left dropdownHover">
                                <button type="button" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 admin-dropdown dropdownHover" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    Options
                                </button>
                                <div class="absolute right-0 z-10 my-0 w-56 origin-top-right rounded-md bg-white shadow-lg focus:outline-none h-0 overflow-hidden dropdown-child dropdownHover" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="flex flex-col dropdownHover" role="none">
                                        <a href="{{ route('conversations.edit', ['conversation' => $conversation->id]) }}" class="hover:bg-gray-200 py-1 px-4 dropdownHover">Edit</a>
                                        <form action="{{ route('conversations.destroy', ['conversation' => $conversation->id]) }}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="Delete" class="hover:bg-gray-200 py-1 px-4 dropdownHover cursor-pointer text-left w-full" onclick="return confirm('Are you sure to delete?')"> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$conversations->links()}}
        </div>
        </div>
@endsection
@section('scripts')

@include('admin.users.partials.scripts')

@endsection