<form method="post" action="index.php?controller=exportar&action=exportarRevisiones">
    <div class="row d-flex justify-content-center bordes">
        <div class="col-12">
            <h5>EXPORTAR REVISIONES</h5>
        </div>
        <div class="col-8 mt-5" style=" height: auto">
            <div class="form-group">
                <label for="FECHA_INICIO">FECHA INICIO</label>
                <input id="FECHA_INICIO" class="form-control" type="text" name="FECHA_INICIO" placeholder="YYYY/MM/DD" required/>
                <label for="FECHA_FIN">FECHA FIN</label>
                <input type="text" class="form-control" name="FECHA_FIN" id="FECHA_FIN" placeholder="YYYY/MM/DD" required>
            </div>
            <div class="form-group">
                <label for="empresa">EMPRESA</label>
                <select id="EMPRESA" name="EMPRESA" class="form-control">
                    <option value="21">Autoperiferia</option>
                    <option value="8">Martin</option>
                    <option value="10">Ruiz</option>
                    <option value="5">Unauto</option>
                    <option value="14">Murcia</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <button type="submit" class="btn btn-success">Exportar</button>
            </div>
        </div>
    </div>
</form>
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="js/lightpick/lightpick.js"></script>
<script>
    var picker = new Lightpick({
        field: document.getElementById('FECHA_INICIO'),
        secondField: document.getElementById('FECHA_FIN'),
        parentEl: 'body',
        hideOnBodyClick: true,
        singleDate: false,
        repick: true,
        format: 'YYYY-MM-DD',
        selectForward: true,
        lang: 'es',
        locale: {
            tooltip: {
                one: 'día',
                few: 'días',
                many: 'días',
            },
            pluralize: function(i, locale) {
                if ('one' in locale && i % 10 === 1 && !(i % 100 === 11))
                    return locale.one;
                if ('few' in locale && i % 10 === Math.floor(i % 10) && i % 10 >= 2 && i % 10 <= 4 && !(i % 100 >= 12 && i % 100 <= 14))
                    return locale.few;
                if ('many' in locale && (i % 10 === 0 || i % 10 === Math.floor(i % 10) && i % 10 >= 5 && i % 10 <= 9 || i % 100 === Math.floor(i % 100) && i % 100 >= 11 && i % 100 <= 14))
                    return locale.many;
                if ('other' in locale)
                    return locale.other;

                return '';
            }
        },
        maxDate: moment().endOf('day'),
    });
</script>