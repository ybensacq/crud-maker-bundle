<?= $helper->getHead($base_layout_exists, $entity_class_name.' index'); ?>

{% block body %}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $entity_class_name; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?= $entity_class_name; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Liste des <?= $entity_class_name; ?></h3>
                        <a class="btn btn-primary btn-sm" href="{{ path('<?= $route_name; ?>_new') }}">Nouveau</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($entity_fields as $field): ?><th><?= ucfirst($field['fieldName']); ?></th>
                                    <?php endforeach; ?><th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            {% for <?= $entity_var_singular; ?> in <?= $entity_var_plural; ?> %}
                                <tr>
                                    <?php foreach ($entity_fields as $field): ?><td>{{ <?= $helper->getEntityFieldPrintCode($entity_var_singular, $field); ?> }}</td>
                                    <?php endforeach; ?><td>
                                        <a  href="{{ path('<?= $route_name; ?>_show', {'<?= $entity_identifier; ?>': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>}) }}" class="btn btn-flat btn-default">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-flat btn-default" href="{{ path('<?= $route_name; ?>_edit', {'<?= $entity_identifier; ?>': <?= $entity_var_singular; ?>.<?= $entity_identifier; ?>}) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            {% else %}
                                <tr>
                                    <td colspan="<?= (count($entity_fields) + 1); ?>">Aucun élément trouvé</td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{% endblock %}

{% block javascript %}
    {{ parent() }}
    <script>
        $(function () {
            $("#datatable").DataTable({
                "language": {
                    "lengthMenu": "Afficher _MENU_ éléments par page",
                    "zeroRecords": "Aucun élément trouvé",
                    "info": "Voir page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun élément trouvé",
                    "search": "Rechercher : ",
                    "paginate": {
                        "first":      "Début",
                        "last":       "Fin",
                        "next":       "Suivant",
                        "previous":   "Précedent"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
        });
    </script>

{% endblock %}
