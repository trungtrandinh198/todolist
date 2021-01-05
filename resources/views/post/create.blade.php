<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create') }}
        </h2>
    </x-slot>
    <div style="margin-right: 20%; margin-left: 20%; padding-top: 20px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="create-post" method="POST">
                @csrf
                <div>
                    <p>Tiêu đề</p>
                    <input class="form-control" name="title" id="title">
                </div>
                <div>
                    <p>Nội dung</p>
                    <input class="form-control" name="body" id="body">
                </div>
                <div style="padding-top: 20px;">
                    <a class="btn btn-info" href="/" >Trở về</a>
                    <input class="btn btn-success" type="submit" name="submit" value="Thêm mới">
                </div>
            </form>
    </div>
</x-app-layout>
