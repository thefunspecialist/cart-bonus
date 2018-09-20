<?php

namespace MageSuite\CartBonus\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (!$setup->getConnection()->tableColumnExists($setup->getTable('salesrule'), 'is_visible_as_cart_bonus')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('salesrule'),
                'is_visible_as_cart_bonus', [
                    'type' => Table::TYPE_SMALLINT,
                    'comment' => 'Is rule visible as cart bonus',
                    'default' => 0
                ]
            );
        }

        if (!$setup->getConnection()->tableColumnExists($setup->getTable('salesrule'), 'is_label_visible_by_default')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('salesrule'),
                'is_label_visible_by_default', [
                    'type' => Table::TYPE_SMALLINT,
                    'comment' => 'Is label visible by default',
                    'default' => 0
                ]
            );
        }

        $setup->endSetup();
    }
}
