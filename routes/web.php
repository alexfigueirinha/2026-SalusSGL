<?php

use App\Livewire\Ala\AlasCreate;
use App\Livewire\Ala\AlasEdit;
use App\Livewire\Ala\AlasIndex;
use App\Livewire\Leito\LeitosCreate;
use App\Livewire\Leito\LeitosEdit;
use App\Livewire\Leito\LeitosIndex;
use App\Livewire\MovimentacaoLeito\MovimentacaoLeitosCreate;
use App\Livewire\MovimentacaoLeito\MovimentacaoLeitosEdit;
use App\Livewire\MovimentacaoLeito\MovimentacaoLeitosIndex;
use App\Livewire\StatusLeito\StatusLeitosCreate;
use App\Livewire\StatusLeito\StatusLeitosEdit;
use App\Livewire\StatusLeito\StatusLeitosIndex;
use App\Livewire\Usuario\UsuariosCreate;
use App\Livewire\Usuario\UsuariosEdit;
use App\Livewire\Usuario\UsuariosIndex;
use Illuminate\Support\Facades\Route;

Route::get('ala/create', AlasCreate::class)->name('ala.create');
Route::get('ala/index', AlasIndex::class)->name('ala.index');
Route::get('ala/edit/(id)', AlasEdit::class)->name('ala.edit');

Route::get('leito/create', LeitosCreate::class)->name('leito.create');
Route::get('leito/index', LeitosIndex::class)->name('leito.index');
Route::get('leito/edit/(id)', LeitosEdit::class)->name('leito.edit');

Route::get('movimentacao/leito/create', MovimentacaoLeitosCreate::class)->name('movimentacao.leito.create');
Route::get('movimentacao/leito/index', MovimentacaoLeitosIndex::class)->name('movimentacao.leito.index');
Route::get('movimentacao/leito/edit/(id)', MovimentacaoLeitosEdit::class)->name('movimentacao.leito.edit');

Route::get('status/leito/create', StatusLeitosCreate::class)->name('status.leito.create');
Route::get('status/leito/index', StatusLeitosIndex::class)->name('status.leito.index');
Route::get('status/leito/edit/(id)', StatusLeitosEdit::class)->name('status.leito.editar');

Route::get('usuario/create', UsuariosCreate::class)->name('usuario.create');
Route::get('usuario/index', UsuariosIndex::class)->name('usuario.index');
Route::get('usuario/edit/(id)', UsuariosEdit::class)->name('usuario.edit');


