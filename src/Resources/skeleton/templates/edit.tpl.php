<?= $helper->getHead($base_layout_exists, 'Edition '.$entity_class_name); ?>

{% block body %}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $entity_class_name; ?>
            <small>Edition <?= $entity_class_name; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $entity_class_name; ?></a></li>
            <li class="active">Edition <?= $entity_class_name; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edition d'un <?= $entity_class_name; ?></h3>
                    </div>

                    <div class="box-body">
                        {% include '<?= $route_name; ?>/_form.html.twig' with {'form': form, 'button_label': 'Edit'} only %}
                        {% include '<?= $route_name; ?>/_delete_form.html.twig' with {'identifier': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>} only %}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{% endblock %}