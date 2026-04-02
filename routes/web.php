<?php

use App\Livewire\Internacao\InternacaosCreate;
use App\Livewire\Internacao\InternacaosEdit;
use App\Livewire\Internacao\InternacaosIndex;
use App\Livewire\Paciente\PacientesCreate;
use App\Livewire\Paciente\PacientesEdit;
use App\Livewire\Paciente\PacientesIndex;
use App\Livewire\Quarto\QuartosCreate;
use App\Livewire\Quarto\QuartosEdit;
use App\Livewire\Quarto\QuartosIndex;
use App\Livewire\StatusQuarto\StatusQuartosCreate;
use App\Livewire\StatusQuarto\StatusQuartosEdit;
use App\Livewire\StatusQuarto\StatusQuartosIndex;
use Illuminate\Support\Facades\Route;

Route::get('/internacao/create', InternacaosCreate::class)->name('internacao.create');
Route::get('/internacao/index', InternacaosIndex::class)->name('internacao.index');
Route::get('/internacao/edit/{id}', InternacaosEdit::class)->name('internacao.edit');

Route::get('/pacientes/create', PacientesCreate::class)->name('paciente.create');
Route::get('/pacientes/index', PacientesIndex::class)->name('paciente.index');
Route::get('/pacientes/edit/{id}', PacientesEdit::class)->name('paciente.edit');

Route::get('/quarto/create', QuartosCreate::class)->name('quarto.create');
Route::get('/quarto/index', QuartosIndex::class)->name('quarto.index');
Route::get('/quarto/edit/{id}', QuartosEdit::class)->name('quarto.edit');

Route::get('/status/quarto/create', StatusQuartosCreate::class)->name('status.quarto.create');
Route::get('/status/quarto/index', StatusQuartosIndex::class)->name('status.quarto.index');
Route::get('/status/quarto/edit/{id}', StatusQuartosEdit::class)->name('status.quarto.edit');