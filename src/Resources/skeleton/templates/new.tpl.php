<?= $helper->getHead($base_layout_exists, 'Nouveau '.$entity_class_name); ?>

{% block body %}
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $entity_class_name; ?>
            <small>Nouveau <?= $entity_class_name; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $entity_class_name; ?></a></li>
            <li class="active">Nouveau <?= $entity_class_name; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Création d'un <?= $entity_class_name; ?></h3>
                    </div>

                    <div class="box-body">
                        {% include '<?= $route_name; ?>/_form.html.twig' with {'form': form, 'button_label': 'Edit'} only %}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{% endblock %}