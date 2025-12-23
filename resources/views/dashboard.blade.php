<style>
    .layout {
            display: flex;
            flex-direction: row;
        }

    .content {
            flex: 1;
            padding: 16px;
        }
    .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 16px;
        }
</style>

<div class="">
    <x-navbar />
    <div class="layout">
        <x-sidebar />
        <div class="content">
            <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
            <div class="card">
                <!-- isi konten dashboard -->
            </div>
        </div>
    </div>
</div>
