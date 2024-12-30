<x-tests.app>
    <x-slot name="header">
        ヘッダー1
    </x-slot>

    コンポーネントテスト1

    <main>
        <x-tests.card title="タイトル" content="本文" :message="$message" />
    </main>

</x-tests.app>
