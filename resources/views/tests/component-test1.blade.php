<x-tests.app>
    <x-slot name="header">
        ヘッダー1
    </x-slot>

    コンポーネントテスト1

    <main>
        <x-tests.card title="タイトル" content="本文" :message="$message" />
        <x-tests.card title="タイトル2" />
    </main>

</x-tests.app>
