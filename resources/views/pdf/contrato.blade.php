<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotrato habitacion {{ $contrato->habitacion->numero }}</title>
    <style>
        body {
            margin-top: 100px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: right;
            line-height: 50px;
            font-size: 14px;
            font-weight: bold;
            color: gray;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        @php
            $partes = explode(' ', $contrato->created_at);
            $fechaPartes = explode('-', $partes[0]);
            $mes = '';
            switch ($fechaPartes[1]) {
                case '01':
                    $mes = 'Enero';
                    break;
                case '02':
                    $mes = 'Febrero';
                    break;
                case '03':
                    $mes = 'Marzo';
                    break;
                case '04':
                    $mes = 'Abril';
                    break;
                case '05':
                    $mes = 'Mayo';
                    break;
                case '06':
                    $mes = 'Junio';
                    break;
                case '07':
                    $mes = 'Julio';
                    break;
                case '08':
                    $mes = 'Agosto';
                    break;
                case '09':
                    $mes = 'Septiembre';
                    break;
                case '10':
                    $mes = 'Octubre';
                    break;
                case '11':
                    $mes = 'Noviembre';
                    break;
                case '12':
                    $mes = 'Diciembre';
                    break;
            }
        @endphp
        Ecatepec Estado de México, a {{ $fechaPartes[2] }} de {{ $mes }} del {{ $fechaPartes[0] }}.
    </header>
    <main>
        <h1 style="text-align: center;">
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            CONTRATO DE HOSPEDAJE
            TEMPORAL HABITACION NUMERO <span
                style="text-decoration: underline;">{{ $contrato->habitacion->numero }}</span>
            CASA COMPARTIDA EN VALLE DE PAPALOAPAN 29 VALLE
            DE ARAGON 3ª SECCION
            ECATEPEC EDO. MEX C.P. 55280
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </h1>
        <p>
        <h5 style="text-align:center;"><strong>REUNIDOS</strong></h5>
        ARRENDADOR: C. Rene Ortuño Mendoza mayor de edad, titular de la credencial electoral (número de INE) y
        propietario de la vivienda compartida situada en VALLE DEL PAPALOAPAN NO. 29 COL. VALLE DE ARAGON TERCERA
        SECCION ECATEPEC EDOMEX. C.P. 55280
        <br><br>
        ARRENDATARIO: C <span style="text-decoration: underline;">{{ $contrato->residente->name }}
            {{ $contrato->residente->apaterno }} {{ $contrato->residente->amaterno }}</span>. mayor de edad, titular de
        la credencial electoral <span style="text-decoration: underline;">{{ $contrato->residente->num_ine }}</span> y
        con
        domicilio para notificaciones: <span
            style="text-decoration: underline;">{{ $contrato->residente->domicilio_emergencia }}</span>
        <h5 style="text-align:center;"><strong>I. DECLARAN LAS PARTES:</strong></h5>
        1. Que en el presente Contrato no existe dolo, error, mala fe o cualquier otro vicio de la voluntad, por lo que
        expresamente renuncian a invocarlos en cualquier tiempo.
        <br><br>
        2. Que se reconocen la personalidad con la que comparecen a la celebración de este contrato y expresamente
        convienen en someterse a las obligaciones contenidas en las siguientes:
        <br><br>
        3. Que el C. Rene Ortuño Mendoza, en lo sucesivo arrendador, tiene facultades legales para el arrendamiento
        total o parcial de la vivienda al principio indicada.
        <br><br>
        4. Que el objeto del arrendamiento es la habitación núm <span
            style="text-decoration: underline;">{{ $contrato->habitacion->numero }}</span>., que se encuentra
        amueblada, con el mobiliario,
        enseres y objetos que se determinan en el inventario (ANEXO 1) que se adjunta al presente contrato y que forma
        parte integrante del mismo. Como complemento podrá usar los elementos internos de la vivienda, cuarto de baño,
        cocina, sala, comedor, cuarto de lavado, jardín, asador etc.
        <br><br>
        5. Que el C. <span style="text-decoration: underline;">{{ $contrato->residente->name }}
            {{ $contrato->residente->apaterno }} {{ $contrato->residente->amaterno }}</span> , en lo sucesivo
        el arrendatario, quiere alquilar una habitación en la vivienda.
        <br><br>
        6. Que la habitación se encuentra en buen estado, apta para ser habitada, con el mobiliario y enseres que se
        recogen en el anexo 1 de este contrato.
        <h5 style="text-align:center;">
            <strong>
                DECLARACIONES
                <br>
                II. DECLA EL ARRENDADOR:
            </strong>
        </h5>
        A. Que tiene las facultades suficientes y bastantes para obligarse en términos del presente instrumento.
        <br><br>
        B. Que es el único legítimo propietario del inmueble ubicado en VALLE DEL PAPALOAPAN #29 VALLE DE ARAGON 3ª
        SECCION ECATEPEC EDO MEX CP 55280 (el “Inmueble”), y que es su deseo dar en arrendamiento LA HABITACION NUMERO
        <span style="text-decoration: underline;">{{ $contrato->habitacion->numero }}</span> DE LA VIVIENDA COMPARTIDA
        en favor del Arrendatario.
        <br><br>
        C. Qué está legalmente facultado para dar en arrendamiento LA HABITACION NUMERO <span
            style="text-decoration: underline;">{{ $contrato->habitacion->numero }}</span> del Inmueble en los
        términos y condiciones establecidos en este contrato.
        <h5 style="text-align:center;">
            <strong>III. DECLARA EL ARRENDATARIO:</strong>
        </h5>
        III. DECLARA EL ARRENDATARIO:
        A. Que tiene las facultades suficientes y bastantes para obligarse en términos del presente Contrato, así como
        los recursos suficientes para cumplir con las obligaciones derivadas del mismo, los cuales obtiene de
        actividades licitas.
        <br><br>
        B. Que es su deseo tomar en arrendamiento el Inmueble, el cual conoce y reconoce que se encuentra en las
        condiciones necesarias de seguridad, higiene y salubridad para ser habitado y que cuenta con todo lo que se
        señala en el inventario que se adjunta al presente como Anexo 1 y que todos sus servicios se encuentran
        funcionando, por lo que no condicionará el pago de rentas a ningún tipo de mejora.
        <h5 style="text-align:center;">
            <strong>IV. AMBAS PARTES CONVIENEN</strong>
        </h5>
        A. En la renta de la habitación <span
            style="text-decoration: underline;">{{ $contrato->habitacion->numero }}</span>, que se inicia el día <span
            style="text-decoration: underline;">{{ $contrato->fecha_inicio }}</span>, finalizando sin necesidad
        de previo aviso el <span style="text-decoration: underline;">{{ $contrato->fecha_fin }}</span>.
        <br><br>
        B. El precio del arriendo es de $<span
            style="text-decoration: underline;">{{ number_format($contrato->renta_num) }}
            ({{ $contrato->renta_text }})</span> mensuales
        incluido: Mantenimiento, internet, luz, agua y gas. Precio que se abonará inequívocamente vía transferencia
        electrónica o deposito a la cuenta acordada.
        <h5 style="text-align:center;">
            <strong>V. PAGOS</strong>
        </h5>
        A. El pago del arrendamiento es improrrogable no hay tolerancia y deberá pagarse a los dias 1 de cada mes, fecha
        que será tomada de la firma del presente contrato.
        <br><br>
        B. El pago de la renta será por meses adelantados, debiendo cubrirse íntegra la renta mensual, aun cuando no se
        usare el Inmueble el mes completo.
        <br><br>
        C. Será causa de rescisión de este Contrato, sin necesidad de intervención judicial alguna, el hecho de que se
        pague extemporáneamente la renta, o de que ésta no sea cubierta o bien que se viole el reglamento ANEXO II.
        <br><br>
        D. El Arrendatario no podrá en ningún caso retener las rentas, bajo ningún título judicial, ni extrajudicial,
        debiendo hacer el pago íntegro, a más tardar en el plazo que se describe en el inciso b) de esta Cláusula, por
        lo que, de no hacerlo en el tiempo, modo y lugar convenidos, pagará una pena convencional del 5% (cinco por
        ciento) sobre el importe de la renta.
        <br><br>
        E. Si el Arrendador recibe la renta en fecha y forma distinta de la estipulada, o recibe abonos a cuenta de
        estas, no se mantendrá renovado el Contrato, ni sus términos, plazos o formas de pago.
        <br><br>
        F. En caso de prórroga del presente Contrato, en cada aniversario del mismo el monto de la renta mensual será
        incrementada en el mismo porcentaje que el Índice Nacional de Precios al Consumidor.
        <br><br>
        G. Este contrato no tiene validez como justificante de pago del arriendo. El ARRENDADOR deberá entregar al
        ARRENDATARIO un recibo como justificante de pago de cada mensualidad, salvo que el pago se haga por
        transferencia, en cuyo caso servirá con el recibo emitido por el banco.
        <h5 style="text-align:center;">
            <strong>VI. DEPOSITO EN GARANTIAS</strong>
        </h5>
        A. A la fecha de firma del presente Contrato, el Arrendatario entrega al Arrendador por concepto de depósito en
        garantía la cantidad de $<span style="text-decoration: underline;">{{ number_format($contrato->deposito_num) }}
            ({{ $contrato->deposito_text }})</span>, equivalente a 1 mes (es)
        de renta. En caso de variación en el monto de la renta, este depósito se ajustará dentro de los cinco días
        siguientes, para que siempre corresponda a 1 mes(es) de la renta en vigor.
        <br><br>
        B. Las partes acuerdan que el Arrendador no aplicará el depósito al pago de cualquier mensualidad vencida, o al
        pago de cualquier otra obligación incumplida por el Arrendatario ya que dicho depósito no podrá utilizarse para
        compensar la falta de pago de los anteriores conceptos. Tampoco podrá el Arrendatario dejar de pagar rentas,
        basado en que las mismas quedarán cubiertas con el mencionado depósito.
        <br><br>
        C. El Arrendatario autoriza expresamente al Arrendador a conservar dicho depósito durante un plazo de 20 días
        posteriores a que haya desocupado y entregado el Inmueble, autorizando en este acto el Arrendatario al
        Arrendador a que éste haga uso del monto del depósito para aquellos arreglos por deterioros en el Inmueble no
        derivados de su uso normal por parte del Arrendatario. Transcurrido este plazo, el Arrendador devolverá al
        Arrendatario el mencionado depósito sin interés ni rendimiento financiero alguno, siempre y cuando éste no se
        hubiere ocupado en arreglar deterioros en el Inmueble no causados por su uso normal o no existiere ningún saldo
        pendiente por servicios a cargo del Arrendatario o por cualquier otro concepto.
        <h5 style="text-align:center;">
            <strong>VII. CUARTA. VIGENCIA</strong>
        </h5>
        A. La vigencia del presente Contrato es de <strong>tres meses forzosos</strong> para ambas partes, iniciando su
        vigencia en la
        fecha de firma del presente Contrato y terminando un trimestre después, debiendo avisar el Arrendatario al
        Arrendador por escrito con por lo menos treinta días naturales de anticipación a su vencimiento, su deseo
        prorrogar o no el arrendamiento, reservándose el Arrendador el derecho de aceptar dicha prórroga, lo cual en
        todo caso se hará mediante la celebración de un nuevo contrato y siempre y cuando el Arrendatario se encuentre
        al corriente en el pago de las rentas y sean renovadas y actualizadas las garantías señaladas en dicho contrato.
        <br><br>
        B. Las partes acuerdan que, a la terminación del presente Contrato, el Arrendatario estará obligado a desocupar
        inmediatamente el Inmueble.
        <h5 style="text-align:center;">
            <strong>VIII. TERMINACIÓN ANTICIPADA.</strong>
        </h5>
        A. En caso de que el Arrendatario pretenda dar por concluido el presente Contrato antes del vencimiento de su
        plazo forzoso, cualquiera que sea la causa, pagarán como pena convencional el importe de 1 meses de renta.
        <br><br>
        B. Del mismo modo, en caso de que EL ARRENDADOR quisiera finalizar el contrato antes de la fecha fijada, podrá
        hacerlo siempre que lo comunique al arrendatario al menos con 30 días de antelación. En caso de violar el
        reglamento (ANEXO II) El arrendatario tiene máximo 8 dias para desocupar la habitación (previo aviso) sin
        derecho a devolución del depósito
        <h5 style="text-align:center;">
            <strong>IX. RESCISIÓN.</strong>
        </h5>
        A. La falsedad en las declaraciones vertidas en este contrato y/o el incumplimiento de las partes a cualquiera
        de sus obligaciones será motivo de su rescisión, sin necesidad de intervención judicial alguna, quedando la
        parte que incumplió obligada a pagar los daños y perjuicios causados a la otra parte.
        <br><br>
        B. Sera motivo de rescisión de contrato violar cualquier inciso del reglamento (Anexo II) y no se devolverá el
        depósito en garantía. Debiendo desocupar la habitación máximo 8 dias después del aviso de violación del
        reglamento y no se devolverá el saldo a favor que se tenga.
        <h5 style="text-align:center;">
            <strong>X. USO DE SUELO.</strong>
        </h5>
        A. El inmueble será destinado únicamente para <strong>casa habitación</strong>, quedándole prohibido al
        Arrendatario cambiar el
        uso referido, siendo causa de rescisión el incumplimiento a esta disposición, deslindando al Arrendador desde
        este momento de cualquier responsabilidad si se le diera algún uso distinto al Inmueble, y obligándose a sacar
        al Arrendador en paz y a salvo de cualquier daño y/o perjuicio que le sea causado por este hecho.
        <br><br>
        B. El objeto del arriendo es EXCLUSIVAMENTE la habitación que se indica, sin derecho a utilizar otras
        habitaciones.
        <br><br>
        C. El Arrendatario está de acuerdo en no almacenar sustancias peligrosas, inflamables, corrosivas, deletéreas o
        ilegales dentro del Inmueble. En caso de siniestro, el Arrendatario deberá cubrir al Arrendador y a los terceros
        que resulten afectados los daños y perjuicios que les ocasione.
        <br><br>
        D. No realizar actividades de tipo industrial o actividades molestas, insalubres, nocivas, peligrosas o que
        generen cualquier tipo de inseguridad en su habitación.
        <br><br>
        E. El arrendatario exime de toda responsabilidad al arrendador por los daños que pueda causar en la propiedad
        motivados por negligencia, dolo u omisión del mal uso de la vivienda, sus enseres, instalaciones y accesos. El
        arrendatario asume la responsabilidad civil o penal que se derive de esta mala actuación.
        <h5 style="text-align:center;">
            <strong>XI. CESION DE DERECHOS</strong>
        </h5>
        A. El Arrendatario no podrá subarrendar, traspasar o ceder, en todo o en parte, sus derechos derivados de este
        Contrato. El Arrendador podrá ceder, todo o parte, de sus derechos derivados de este Contrato mediante simple
        notificación por escrito dada al Arrendatario.
        <br><br>
        B. Queda prohibida la estancia en la habitación de terceras personas, así como la cesión PARCIAL ó TOTAL de este
        contrato, sin previo permiso escrito del arrendador.
        <h5 style="text-align:center;">
            <strong>XII. DERECHOS Y OBLIGACIONES</strong>
        </h5>
        A. EL ARRENDATARIO puede hacer uso de: cuarto de baño, cocina, sala, comedor, cuarto de lavado, jardín, asador,
        televisor, Netflix y Gimnasio. y se compromete a respetar las normas de buena convivencia y a mantener y
        compartir con los demás huéspedes de la vivienda, según turnos equitativos, la limpieza de las zonas comunes
        antes mencionadas.
        <br><br>
        B. EL ARRENDATARIO está obligado a: CUMPLIR Y HACER CUMPLIR EL REGLAMENTO (ANEXO 2) DE LA CASA y a respetar el
        descanso de los vecinos y resto de personas que conviven ahí.
        <br><br>
        C. EL ARRENDATARIO ha visitado con anterioridad la habitación del inmueble y declara que está en buen estado,
        obligándose a conservarlo así y a hacerse cargo de los desperfectos que no sean debidos a un uso normal y
        correcto.
        <br><br>
        D. Siendo objeto de arriendo exclusivamente la habitación expresada, el arrendador conserva su derecho a entrar
        y salir del inmueble, por lo que el arrendatario se obliga a no cambiar la cerradura de la puerta y bajo ningún
        concepto contratar los servicios de un cerrajero. Por pérdida de llaves abonará $ 70.00 pesos al arrendador por
        cada llave extraviada. En el caso de la llave de acceso si existiese duda del paradero de la llave extraviada y
        se requiera cambio de combinación el precio del cambio será de $250.00
        E. PROHIBIDO tener animales en la propiedad.
        <br><br>
        F. PROHIBIDO el acceso a cualquier persona ajena,
        <br><br>
        G. PROHIBIDO fumar, beber alcohol o drogarse dentro de la propiedad.
        <br><br>
        H. El arrendatario se compromete a acatar las normas de la comunidad de vecinos, así como los futuros acuerdos
        que se adopten.
        <h5 style="text-align:center;">
            <strong>XIII. SÉPTIMA. INMUEBLE.</strong>
        </h5>
        A. El Arrendatario reconoce que recibe el Inmueble en buen estado, en condiciones de higiene, seguridad y
        salubridad, con todo señalado en el inventario correspondiente, todo lo cual devolverá al terminarse el
        Arrendamiento con el deterioro natural de su uso, siendo por cuenta suya los gastos de reparación y obligándose
        a indemnizar al Arrendador por cualquier daño y perjuicios causados por variaciones en el Inmueble.
        <br><br>
        B. El arrendatario reconoce que recibe un control automático para acceso de manera remota a la calle y a la
        propiedad lo cual devolverá al terminarse el arrendamiento con el deterioro natural de su uso, siendo por cuenta
        suya los gastos de reparación y obligándose a indemnizar al Arrendador por cualquier daño y perjuicios causados
        por el mal uso de este. El arrendatario se compromete a vigilar que al entrar y salir de la propiedad y de la
        calle las puertas estén completamente cerradas.
        <br><br>
        C. El Arrendatario está de acuerdo en que no podrá, sin el consentimiento previo y por escrito del Arrendador,
        variar la forma del Inmueble, comprometiéndose a devolverlo en el estado en que lo recibió. Para efectuar
        cualquier mejora o instalación en el Inmueble, deberá obtener autorización previa y por escrito del Arrendador,
        ya que, en caso contrario, todas aquellas que puedan ser aprovechables, quedarán a beneficio del Inmueble, sin
        que exista obligación del Arrendador de cubrir el importe pagado por las mismas, o a su elección de restablecer
        el Inmueble a su estado normal, por lo que el Arrendatario se obliga a pagar los gastos que se originen por lo
        anterior.
        <br><br>
        D. Al finalizar el contrato, se comprobará que haya habido una correcta conservación del piso y mobiliario. En
        caso contrario habrá que pagar la cantidad necesaria para restituir los daños ocasionados a tal efecto, pudiendo
        disponer del importe del depósito como parte del pago de los desperfectos y gastos impagados, y reservándose el
        arrendador el derecho a reclamar la diferencia, si el saldo del depósito fuera insuficiente.
        <br><br>
        E. El arrendatario se compromete a entregar la habitación en buen estado y LIMPIA tal como la recibió. De no ser
        así se descontará del depósito la cantidad de $800.00 por la limpieza de la misma.
        <br><br>
        F. El arrendatario autoriza el ingreso a la habitación del personal administrativo en caso de emergencia (fuga
        de agua, gas, corto circuito, etc.) aun si el arrendatario no se encuentra en la propiedad.
        <br><br>
        G. El arrendatario está de acuerdo que la propiedad cuenta con cámaras de videovigilancia en áreas comunes y
        está siendo gravado con la finalidad de controlar la seguridad de los huéspedes y de la propiedad.
        <h5 style="text-align:center;">
            <strong>XIV. ACUERDO TOTAL.</strong>
        </h5>
        Este Contrato y todos sus Anexos constituyen la totalidad de los acuerdos celebrados entre las partes respecto
        al objeto del mismo, y substituye y deja sin efectos cualquier acuerdo previo entre las partes en relación con
        el mismo.
        <h5 style="text-align:center;">
            <strong>XV. LEYES APLICABLES Y TRIBUNALES COMPETENTES.</strong>
        </h5>
        Para todo lo relacionado con la interpretación y ejecución con este instrumento son aplicables las Leyes
        correspondientes a su objeto y, en caso de controversia, serán competentes los tribunales del Estado de México,
        renunciando las partes expresamente a cualquier otra jurisdicción que pudiera corresponderles por virtud de sus
        domicilios presentes o futuros o por cualquier otro motivo. En virtud de lo cual, las partes han celebrado el
        presente Contrato en la fecha mencionada en el preámbulo del mismo.
        <br><br><br><br>
        <table style="width:100%">
            <tr>
                <td style="text-align:center;">
                    ARRENDADOR:
                    <br><br><br><br>
                    <span style="text-decoration: underline;">Rene Ortuno Mendoza</span>
                </td>
                <td style="text-align:center;">
                    ARRENDATARIO:
                    <br><br><br><br>
                    <span style="text-decoration: underline;">{{ $contrato->residente->name }}
                        {{ $contrato->residente->apaterno }} {{ $contrato->residente->amaterno }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:40px;"></td>
            </tr>
        </table>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <h5 style="text-align:center;">
            <strong>
                ANEXO 1
                <br><br>
                INVENTARIO EQUIPAMIENTO HABITACION
            </strong>
        </h5>
        <table style="width: 100%;" border="1">
            <tr>
                <td width="30%">EQUIPO</td>
                <td width="10%">SUCIO</td>
                <td width="10%">ROTO</td>
                <td width="10%">OK</td>
                <td width="40%">OBSERVACIONES</td>
            </tr>
            <tr>
                <td>CAMA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cama == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cama == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cama == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_cama }}</td>
            </tr>
            <tr>
                <td>COLCHON</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_colchon == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_colchon == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_colchon == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_colchon }}</td>
            </tr>
            <tr>
                <td>FOCOS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_focos == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_focos == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_focos == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_focos }}</td>
            </tr>
            <tr>
                <td>VENTANA VIDRIOS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_ventana_vidrios == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_ventana_vidrios == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_ventana_vidrios == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_ventana_vidrios }}</td>
            </tr>
            <tr>
                <td>PINTURA </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_pintura == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_pintura == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_pintura == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_pintura }}</td>
            </tr>
            <tr>
                <td>PERFORACION PARED</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_perforacion_pared == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_perforacion_pared == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_perforacion_pared == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_perforacion_pared }}</td>
            </tr>
            <tr>
                <td>PUERTAS RAYONES</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_puertas_rayones == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_puertas_rayones == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_puertas_rayones == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_puertas_rayones }}</td>
            </tr>
            <tr>
                <td>CHAPA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_chapa }}</td>
            </tr>
            <tr>
                <td>JUEGO LLAVES </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_juego_llaves == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_juego_llaves == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_juego_llaves == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_juego_llaves }}</td>
            </tr>
            <tr>
                <td>REGADERA FUGAS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_regadera_fugas == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_regadera_fugas == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_regadera_fugas == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_regadera_fugas }}</td>
            </tr>
            <tr>
                <td>TAZA BAÑO ROTURAS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_taza_bano_roturas == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_taza_bano_roturas == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_taza_bano_roturas == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_taza_bano_roturas }}</td>
            </tr>
            <tr>
                <td>LAVABO ROTURAS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavabo_roturas == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavabo_roturas == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavabo_roturas == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_lavabo_roturas }}</td>
            </tr>
            <tr>
                <td>CHAPA VENTANA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa_ventana == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa_ventana == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_chapa_ventana == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_chapa_ventana }}</td>
            </tr>
            <tr>
                <td>ENCHUFES</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_enchufes == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_enchufes == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_enchufes == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_enchufes }}</td>
            </tr>
            <tr>
                <td>APAGADORES</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_apagadores == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_apagadores == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_apagadores == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_apagadores }}</td>
            </tr>
            <tr>
                <td>CORTINAS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cortinas == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cortinas == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_cortinas == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_cortinas }}</td>
            </tr>
            <tr>
                <td>MUEBLE PARA ROPA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_mueble_ropa == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_mueble_ropa == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_mueble_ropa == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_mueble_ropa }}</td>
            </tr>
        </table>
        <br><br><br>
        <br><br><br>
        NOTAS: {{ $contrato->notas }}

        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <h5 style="text-align:center;">
            <strong>
                AREA COMUN
            </strong>
        </h5>
        <table style="width: 100%;" border="1">
            <tr>
                <td width="30%">EQUIPO</td>
                <td width="10%">SUCIO</td>
                <td width="10%">ROTO</td>
                <td width="10%">OK</td>
                <td width="40%">OBSERVACIONES</td>
            </tr>
            <tr>
                <td>ACCESS POINT</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_access_point == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_access_point == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_access_point == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_access_point }}</td>
            </tr>
            <tr>
                <td>INTERNET</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_internet == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_internet == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_internet == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_internet }}</td>
            </tr>
            <tr>
                <td>TELEVISION</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_television == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_television == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_television == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_television }}</td>
            </tr>
            <tr>
                <td>SALA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_sala == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_sala == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_sala == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_sala }}</td>
            </tr>
            <tr>
                <td>MENAJE COCINA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_menaje_cocina == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_menaje_cocina == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_menaje_cocina == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_menaje_cocina }}</td>
            </tr>
            <tr>
                <td>REFRIGERADOR</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_refrigerador == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_refrigerador == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_refrigerador == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_refrigerador }}</td>
            </tr>
            <tr>
                <td>HORNO MICROONDAS</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_horno_microondas == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_horno_microondas == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_horno_microondas == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_horno_microondas }}</td>
            </tr>
            <tr>
                <td>ESTUFA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_estufa == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_estufa == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_estufa == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_estufa }}</td>
            </tr>
            <tr>
                <td>LAVADORA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavadora == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavadora == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_lavadora == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_lavadora }}</td>
            </tr>
            <tr>
                <td>AREA TENDIDO</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_area_tendido == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_area_tendido == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_area_tendido == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_area_tendido }}</td>
            </tr>
            <tr>
                <td>VIDEO VIGILANCIA</td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_video_vigilancia == 'SUCIO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_video_vigilancia == 'ROTO')
                        X
                    @endif
                </td>
                <td style="text-align: center;">
                    @if ($contrato->estatus_video_vigilancia == 'OK')
                        X
                    @endif
                </td>
                <td>{{ $contrato->observaciones_video_vigilancia }}</td>
            </tr>
        </table>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <h5 style="text-align:center;">
            <strong>
                ANEXO II
                <br>
                REGLAMENTO
            </strong>
        </h5>
        A. <strong>Está prohibido el acceso a cualquier persona ajena a la propiedad,</strong> ES RESCISION DE CONTRATO
        SIN DERECHO A
        DEVOLUCION DE DEPOSITO
        <br><br>
        B. El arrendatario deberá lavar y acomodar en su lugar los utensilios de cocina que ocupan (cacerolas,
        licuadora, tazas, vasos, platos, cubiertos, etc.). Tiempo máximo para dejarlo limpio y en su lugar 2 Hrs.
        después de usarlos.
        <br><br>
        C. Retirar los alimentos que dejan en la nevera al final de la semana.
        <br><br>
        D. La limpieza diaria de la habitación es responsabilidad de arrendatario.
        <br><br>
        E. Mantener el baño común limpio dejarlo como te gustaría encontrarlo.
        <br><br>
        F. La seguridad es responsabilidad de todos, asegúrate de cerrar bien las puertas de acceso.
        <br><br>
        G. Están prohibidas las visitas.
        <br><br>
        H. Mantén siempre en tu habitación computadoras, dispositivos electrónicos y pertenencias personales.
        <br><br>
        I. Evita hacer ruidos que molesten a tus vecinos ellos harán lo mismo por ti.
        <br><br>
        J. Respetar el silencio y espacio de los demás.
        <br><br>
        K. Respetar los espacios y los productos ajenos en el refrigerador y alacena
        <br><br>
        L. Respetar los artículos de cocina que sean personales
        <br><br>
        M. Prohibidas mascotas y animales en general
        <br><br>
        N. Prohibida la música a alto volumen
        <br><br>
        O. Solicitar permiso para usar el asador del jardín para no empalmar el uso con otro huésped.
        <br><br>
        P. En caso de temblores o evacuación el jardín es el área más segura
        <br><br>
        Q. Prohibido el consumo y tenencia de drogas y alcohol
        <br><br>
        R. Prohibido fumar dentro de la propiedad
        <br><br>
        S. Respeto por lo ajeno
        <br><br>
        T. Uso de la lavadora: Máximo a lavar por huésped por semana 10 kg. (En una sola carga de lavadora) Los kilos NO
        SON ACUMULABLES.
        <br><br>
        U. NO se pueden lavar en la lavadora cobijas, cobertores o edredones.
        <br><br>
        V. La ropa no puede estar colgada en el área de tendido más de 48 Hrs. para darle espacio a los demás huéspedes.
        <br><br>
        W. Cumplir los horarios de cocina, sala, y lavandería que están pegados en las áreas correspondientes.
        <br><br>
        <strong>SIEMPRE cerrar con doble llave los accesos a la propiedad (reja y puerta de fachada).</strong>
        </p>

        @if ($contrato->estatus != 'Pendiente')
            <br><br><br>
            <center>
                <img src="{{ asset('storage/firma_usuario/' . $contrato->firma) }}" alt="" width="80" />
                <br>
                _____________________________
                <br>
                {{ $contrato->residente->name }} {{ $contrato->residente->apaterno }}
                {{ $contrato->residente->amaterno }}
            </center>
        @endif
    </main>
</body>

</html>
