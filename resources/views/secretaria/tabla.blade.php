@extends('home')
@section('main')

    <body class="page-content">

        <!-- =======  Data-Table  = Start  ========================== -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre </th>
                                    <th>Grupo</th>
                                    <th>Semestre</th>
                                    <th>Edad</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Isabella</td>
                                    <td>705</td>
                                    <td>Séptimo</td>
                                    <td>19</td>
                                    <td>2013/06/20</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Miguel</td>
                                    <td>206</td>
                                    <td>Segundo</td>
                                    <td>20</td>
                                    <td>2011/09/12</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Ana</td>
                                    <td>807</td>
                                    <td>Octavo</td>
                                    <td>21</td>
                                    <td>2010/03/08</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Ricardo</td>
                                    <td>308</td>
                                    <td>Tercero</td>
                                    <td>22</td>
                                    <td>2009/12/01</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Valeria</td>
                                    <td>409</td>
                                    <td>Cuarto</td>
                                    <td>20</td>
                                    <td>2012/04/30</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Diego</td>
                                    <td>510</td>
                                    <td>Quinto</td>
                                    <td>23</td>
                                    <td>2010/07/18</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Sofía</td>
                                    <td>611</td>
                                    <td>Sexto</td>
                                    <td>21</td>
                                    <td>2011/11/25</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Gabriel</td>
                                    <td>112</td>
                                    <td>Primer</td>
                                    <td>19</td>
                                    <td>2013/02/14</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Laura</td>
                                    <td>713</td>
                                    <td>Séptimo</td>
                                    <td>20</td>
                                    <td>2012/09/05</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Alejandro</td>
                                    <td>214</td>
                                    <td>Segundo</td>
                                    <td>22</td>
                                    <td>2010/05/28</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Camila</td>
                                    <td>815</td>
                                    <td>Octavo</td>
                                    <td>21</td>
                                    <td>2011/08/10</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Andrés</td>
                                    <td>316</td>
                                    <td>Tercero</td>
                                    <td>23</td>
                                    <td>2009/10/17</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Isaac</td>
                                    <td>417</td>
                                    <td>Cuarto</td>
                                    <td>19</td>
                                    <td>2012/12/22</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Maria</td>
                                    <td>518</td>
                                    <td>Quinto</td>
                                    <td>20</td>
                                    <td>2010/01/14</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Jorge</td>
                                    <td>619</td>
                                    <td>Sexto</td>
                                    <td>21</td>
                                    <td>2011/05/30</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Anabel</td>
                                    <td>120</td>
                                    <td>Primer</td>
                                    <td>22</td>
                                    <td>2013/08/07</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Raul</td>
                                    <td>721</td>
                                    <td>Séptimo</td>
                                    <td>20</td>
                                    <td>2012/11/19</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Paola</td>
                                    <td>322</td>
                                    <td>Tercero</td>
                                    <td>23</td>
                                    <td>2009/04/02</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Fernando</td>
                                    <td>423</td>
                                    <td>Cuarto</td>
                                    <td>21</td>
                                    <td>2011/07/11</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Valentina</td>
                                    <td>824</td>
                                    <td>Octavo</td>
                                    <td>20</td>
                                    <td>2010/10/24</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Luis</td>
                                    <td>525</td>
                                    <td>Quinto</td>
                                    <td>22</td>
                                    <td>2012/03/08</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Marta</td>
                                    <td>626</td>
                                    <td>Sexto</td>
                                    <td>20</td>
                                    <td>2011/06/15</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Eduardo</td>
                                    <td>227</td>
                                    <td>Segundo</td>
                                    <td>21</td>
                                    <td>2010/09/28</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Ana María</td>
                                    <td>728</td>
                                    <td>Séptimo</td>
                                    <td>23</td>
                                    <td>2009/12/11</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Pablo</td>
                                    <td>329</td>
                                    <td>Tercero</td>
                                    <td>19</td>
                                    <td>2013/02/17</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Carolina</td>
                                    <td>830</td>
                                    <td>Octavo</td>
                                    <td>20</td>
                                    <td>2010/05/22</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Rodrigo</td>
                                    <td>431</td>
                                    <td>Cuarto</td>
                                    <td>21</td>
                                    <td>2012/08/03</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Sara</td>
                                    <td>532</td>
                                    <td>Quinto</td>
                                    <td>22</td>
                                    <td>2011/11/30</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Alberto</td>
                                    <td>633</td>
                                    <td>Sexto</td>
                                    <td>20</td>
                                    <td>2010/04/14</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Isabel</td>
                                    <td>234</td>
                                    <td>Segundo</td>
                                    <td>21</td>
                                    <td>2009/07/07</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Felipe</td>
                                    <td>735</td>
                                    <td>Séptimo</td>
                                    <td>23</td>
                                    <td>2013/10/18</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Julia</td>
                                    <td>336</td>
                                    <td>Tercero</td>
                                    <td>19</td>
                                    <td>2012/01/22</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Héctor</td>
                                    <td>437</td>
                                    <td>Cuarto</td>
                                    <td>20</td>
                                    <td>2010/04/05</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Beatriz</td>
                                    <td>538</td>
                                    <td>Quinto</td>
                                    <td>22</td>
                                    <td>2011/08/11</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Fabián</td>
                                    <td>639</td>
                                    <td>Sexto</td>
                                    <td>21</td>
                                    <td>2010/12/28</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Lucía</td>
                                    <td>240</td>
                                    <td>Segundo</td>
                                    <td>19</td>
                                    <td>2013/03/14</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Roberto</td>
                                    <td>741</td>
                                    <td>Séptimo</td>
                                    <td>20</td>
                                    <td>2012/06/07</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Elena</td>
                                    <td>342</td>
                                    <td>Tercero</td>
                                    <td>23</td>
                                    <td>2010/09/01</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Rafael</td>
                                    <td>443</td>
                                    <td>Cuarto</td>
                                    <td>21</td>
                                    <td>2011/12/15</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Adriana</td>
                                    <td>544</td>
                                    <td>Quinto</td>
                                    <td>22</td>
                                    <td>2010/02/28</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Juan</td>
                                    <td>646</td>
                                    <td>Sexto</td>
                                    <td>22</td>
                                    <td>2011/05/18</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Renata</td>
                                    <td>247</td>
                                    <td>Segundo</td>
                                    <td>20</td>
                                    <td>2010/08/22</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Ricardo</td>
                                    <td>748</td>
                                    <td>Séptimo</td>
                                    <td>23</td>
                                    <td>2009/11/04</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Mónica</td>
                                    <td>349</td>
                                    <td>Tercero</td>
                                    <td>19</td>
                                    <td>2013/01/11</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Felipe</td>
                                    <td>850</td>
                                    <td>Octavo</td>
                                    <td>20</td>
                                    <td>2010/04/29</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Camilo</td>
                                    <td>451</td>
                                    <td>Cuarto</td>
                                    <td>21</td>
                                    <td>2012/07/08</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Lorena</td>
                                    <td>552</td>
                                    <td>Quinto</td>
                                    <td>22</td>
                                    <td>2011/10/25</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Gustavo</td>
                                    <td>653</td>
                                    <td>Sexto</td>
                                    <td>20</td>
                                    <td>2010/03/14</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Marina</td>
                                    <td>254</td>
                                    <td>Segundo</td>
                                    <td>21</td>
                                    <td>2009/06/27</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Raul</td>
                                    <td>755</td>
                                    <td>Séptimo</td>
                                    <td>23</td>
                                    <td>2013/09/10</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Victoria</td>
                                    <td>354</td>
                                    <td>Tercero</td>
                                    <td>19</td>
                                    <td>2012/02/03</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Martín</td>
                                    <td>456</td>
                                    <td>Cuarto</td>
                                    <td>20</td>
                                    <td>2010/05/16</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Diana</td>
                                    <td>857</td>
                                    <td>Octavo</td>
                                    <td>21</td>
                                    <td>2011/08/30</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Carlos</td>
                                    <td>458</td>
                                    <td>Cuarto</td>
                                    <td>23</td>
                                    <td>2009/12/03</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Laura</td>
                                    <td>559</td>
                                    <td>Quinto</td>
                                    <td>20</td>
                                    <td>2012/01/20</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>José</td>
                                    <td>660</td>
                                    <td>Sexto</td>
                                    <td>21</td>
                                    <td>2011/04/06</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Alicia</td>
                                    <td>261</td>
                                    <td>Segundo</td>
                                    <td>22</td>
                                    <td>2013/07/15</td>
                                    <td>Aceptado</td>
                                </tr>
                                <tr>
                                    <td>Ruben</td>
                                    <td>762</td>
                                    <td>Séptimo</td>
                                    <td>20</td>
                                    <td>2012/10/28</td>
                                    <td>Pendiente</td>
                                </tr>
                                <tr>
                                    <td>Eva</td>
                                    <td>363</td>
                                    <td>Tercero</td>
                                    <td>23</td>
                                    <td>2009/03/02</td>
                                    <td>Rechazado</td>
                                </tr>
                                <tr>
                                    <td>Óscar</td>
                                    <td>464</td>
                                    <td>Cuarto</td>
                                    <td>21</td>
                                    <td>2011/06/17</td>
                                    <td>Aceptado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      
    </body>
@endsection
