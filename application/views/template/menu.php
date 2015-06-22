<!-- Inicio Menu -->
    <?php if(!is_null($menu)) { ?>
    <ul class="nav nav-tabs nav-justified">
        <?php foreach($menu as $item):
            $modulo=$this->uri->segment(1); ?>
        <li role="presentation">
            <?php echo ($modulo == strtolower($item)) ? '' : '' ; ?>
            <a href='<?php echo site_url(''.strtolower($item).'/')?>'>
                <?php switch ($item):
                case 'Periodos_salida':
                    echo 'Salidas';
                    break;
                case 'Tipos_permiso': 
                    echo 'Permisos'; 
                    break;
                case 'Modulos':
                    echo 'Módulos';
                    break; 
                default: 
                    echo $item; 
                    break;
                endswitch; ?>
            </a>
        </li>
        <?php endforeach; }?>
    </ul>
<!-- Fin Menu -->