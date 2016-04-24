<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use DB;
use October\Rain\Database\Updates\Migration;


class CreateViewOptionsFilter extends Migration
{
    public function up()
    {
        DB::statement("CREATE VIEW brcommerce_options_filter AS
            WITH options AS(
                SELECT
                    p.id,
                    json_array_elements(options) as options,
                    pc.category_id as category
                FROM brenodouglasaraujosouza_brcommerce_product p
                INNER JOIN brenodouglasaraujosouza_brcommerce_product_has_category pc ON pc.product_id = p.id
            )
            SELECT
                lower(o.options->>'name') as name,
                lower(o.options->>'value') as value,
                o.options->>'label' as label,
                o.options->>'type' as type,
                count(o.id) as total,
                o.category as category_id
            FROM options as o
            WHERE o.options->>'filter' = '1'
            GROUP BY lower(o.options->>'name'), lower(o.options->>'value'), o.category, o.options->>'label', o.options->>'type' "
        );
    }

    public function down()
    {
        DB::statement('DROP VIEW brcommerce_options_filter');
    }

}