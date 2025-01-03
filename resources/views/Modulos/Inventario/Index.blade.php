@extends('Layouts.App')

@section('title','Inventario - Laboratorio')

@section('page-title')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('app.home')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Inventario</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection
@section('content')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <button class="btn btn-outline-success btn-sm">Nuevo lente <i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body p-1">
            <div class="card">
                <div class="card-body">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">lentes Essilor - VS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">lentes Essilor - Bifocal</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">lentes Essilor - Multifocal</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Esf/Cil</th>
                                    <!-- Columnas de cilindros -->
                                    <th>0.00</th>
                                    <th>-0.25</th>
                                    <th>-0.50</th>
                                    <th>-0.75</th>
                                    <th>-1.00</th>
                                    <th>-1.25</th>
                                    <th>-1.50</th>
                                    <th>-1.75</th>
                                    <th>-2.00</th>
                                    <th>-2.25</th>
                                    <th>-2.50</th>
                                    <th>-2.75</th>
                                    <th>-3.00</th>
                                    <th>-3.25</th>
                                    <th>-3.50</th>
                                    <th>-3.75</th>
                                    <th>-4.00</th>
                                    <th>-4.25</th>
                                    <th>-4.50</th>
                                    <th>-4.75</th>
                                    <th>-5.00</th>
                                    <th>-5.25</th>
                                    <th>-5.50</th>
                                    <th>-5.75</th>
                                    <th>-6.00</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Filas de esferas -->
                                <tr>
                                    <th>+6.00</th>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>+5.75</th>
                                    <!-- Rellena según sea necesario -->
                                </tr>
                                <!-- Agrega más filas aquí para las demás esferas -->
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                      Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="bordered-contact" role="tabpanel" aria-labelledby="contact-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                  </div><!-- End Bordered Tabs -->
    
                </div>
              </div>
        </div>
    </div>
@endsection