
function tms_ini(name) {
  var roles = ['admin','user','user_cost','user_rev']; // from report -> role_whitelist 
  var report_presets = {       // from report - role_whitelist
    收入报告: {
      sql_select: ' select ACC_MON as 财务月度, CUSTOMER as 客户, sum(TTL_REV) as 收入小计 from shipment ',
      sql_group_by: ' group by ACC_MON, CUSTOMER',
      role_whitelist:'admin,user,user_rev,'
    },
    成本报告: {
      sql_select: ' select ACC_MON as 财务月度, VENDOR as 供应商, sum(TTL_COST) as 成本小计 from shipment ',
      sql_group_by: ' group by ACC_MON,VENDOR',
      role_whitelist: 'admin,user,user_cost'
    },
    收入成本对照: {
      sql_select: ' select ACC_MON as 财务月度, CUSTOMER as 客户, VENDOR as 供应商, sum(TTL_REV) as 收入小计, sum(TTL_COST) as 成本小计 from shipment ',
      sql_group_by: ' group by ACC_MON, CUSTOMER, VENDOR',
      role_whitelist: 'admin,user'
    }
  };
  var shipment_fields = {  // shipment.html ?
    ID: { label: 'ID', type: 'number', step: '1', char_lenth: '4' },
    CONSOLE_ID: { label: '主单ID', type: 'text', step: '', char_lenth: '4' },
    STATION: { label: '站点', type: 'text', step: '', char_lenth: '4' },
    CUSTOMER: { label: '客户', type: 'text', step: '', char_lenth: '8' },
    ORDER_DATE: { label: '下单日期', type: 'date', step: '', char_lenth: '6' },
    CS_MODE: { label: '客户模式', type: 'text', step: '', char_lenth: '2' },
    CS_ORDER: { label: '客户订单', type: 'text', step: '', char_lenth: '8' },
    CS_REF1: { label: '客户参考1', type: 'text', step: '', char_lenth: '8' },
    CS_REF2: { label: '客户参考2', type: 'text', step: '', char_lenth: '8' },
    CUSTOMER_REMARK: { label: '客户备注', type: 'textarea', step: '', char_lenth: '20' },
    SHIPPER: { label: '发货人', type: 'text', step: '', char_lenth: '12' },
    SHIPPER_CONTACT: { label: '发货联系人', type: 'text', step: '', char_lenth: '4' },
    ORI: { label: '始发地', type: 'text', step: '', char_lenth: '16' },
    ORI_ADD: { label: '提货地址', type: 'text', step: '', char_lenth: '20' },
    CONSIGNEE: { label: '收货人', type: 'text', step: '', char_lenth: '12' },
    CONSIGNEE_CONTACT: { label: '收货联系人', type: 'text', step: '', char_lenth: '4' },
    CONSIGNEE_TEL: { label: '收货电话', type: 'text', step: '', char_lenth: '8' },
    DEST: { label: '目的地', type: 'text', step: '', char_lenth: '16' },
    DEST_ADD: { label: '送货地址', type: 'text', step: '', char_lenth: '20' },
    PRODUCT_TYPE: { label: '产品属性', type: 'text', step: '', char_lenth: '4' },
    PRODUCT: { label: '产品', type: 'text', step: '', char_lenth: '8' },
    QUANTITY: { label: '数量', type: 'number', step: '1', char_lenth: '4' },
    PACKAGE: { label: '包装', type: 'text', step: '', char_lenth: '4' },
    VOLUME: { label: '体积', type: 'number', step: '0.001', char_lenth: '6' },
    WEIGHT: { label: '重量', type: 'number', step: '0.01', char_lenth: '6' },
    VALUE: { label: '货值', type: 'number', step: '0.01', char_lenth: '6' },
    CHARGABLE_VW: { label: '计费体积重量', type: 'number', step: '0.001', char_lenth: '6' },
    CHARGABLE_RATE_ID: { label: '收入计费ID', type: 'text', step: '', char_lenth: '4' },
    DEP_DATE: { label: '发货日期', type: 'date', step: '', char_lenth: '6' },
    ETA_DATE: { label: '预计到达', type: 'date', step: '', char_lenth: '6' },
    EST_LEADTIME: { label: '预期在途', type: 'number', step: '1', char_lenth: '2' },
    TRACK: { label: '跟踪', type: 'text', step: '', char_lenth: '10' },
    ARV_DATE: { label: '实际到达', type: 'date', step: '', char_lenth: '6' },
    ACT_LEADTIME: { label: '实际在途', type: 'number', step: '1', char_lenth: '2' },
    ARV_STATUS: { label: '到货状态', type: 'text', step: '', char_lenth: '4' },
    POD_ID: { label: '回单ID', type: 'text', step: '', char_lenth: '2' },
    POD_DATE: { label: '回单日期', type: 'date', step: '', char_lenth: '6' },
    OP_REMARK: { label: '操作备注', type: 'text', step: '', char_lenth: '20' },
    DAMAGE_STATUS: { label: '货损状态', type: 'text', step: '', char_lenth: '4' },
    DAMAGE_REPORT: { label: '货损描述', type: 'text', step: '', char_lenth: '20' },
    DAMAGE_RESOLUTION: { label: '货损报告', type: 'text', step: '', char_lenth: '20' },
    PICKUP_JOBNO: { label: '短驳ID', type: 'text', step: '', char_lenth: '4' },
    VENDOR: { label: '运输商', type: 'text', step: '', char_lenth: '10' },
    VENDOR_MODE: { label: '运输模式', type: 'text', step: '', char_lenth: '2' },
    VENDOR_VW: { label: '成本体积重量', type: 'number', step: '0.001', char_lenth: '6' },
    VENDOR_RATE_ID: { label: '成本报价ID', type: 'text', step: '', char_lenth: '5' },
    R_ALLIN: { label: '收入包干费', type: 'number', step: '0.01', char_lenth: '4' },
    R_FTL: { label: '收入整车费', type: 'number', step: '0.01', char_lenth: '4' },
    R_LTL_RATE: { label: '收入零担单价', type: 'number', step: '0.01', char_lenth: '4' },
    R_LTL: { label: '收入零担费', type: 'number', step: '0.01', char_lenth: '4' },
    R_PICKUP: { label: '收入提货费', type: 'number', step: '0.01', char_lenth: '4' },
    R_DELIVERY: { label: '收入送货费', type: 'number', step: '0.01', char_lenth: '4' },
    R_OTH1: { label: '收入其他1', type: 'number', step: '0.01', char_lenth: '4' },
    R_OTH2: { label: '收入其他2', type: 'number', step: '0.01', char_lenth: '4' },
    R_CLAIM: { label: '对客户赔偿', type: 'number', step: '0.01', char_lenth: '4' },
    TTL_REV: { label: '成本小计', type: 'number', step: '0.01', char_lenth: '4' },
    C_ALLIN: { label: '成本包干费', type: 'number', step: '0.01', char_lenth: '4' },
    C_FTL: { label: '成本整车费', type: 'number', step: '0.01', char_lenth: '4' },
    C_LTL_RATE: { label: '成本零担单价', type: 'number', step: '0.01', char_lenth: '4' },
    C_LTL: { label: '成本零担费', type: 'number', step: '0.01', char_lenth: '4' },
    C_PICKUP: { label: '成本提货费', type: 'number', step: '0.01', char_lenth: '4' },
    C_DELIVERY: { label: '成本送货费', type: 'number', step: '0.01', char_lenth: '4' },
    C_OTH1: { label: '成本其他1', type: 'number', step: '0.01', char_lenth: '4' },
    C_OTH2: { label: '成本其他2', type: 'number', step: '0.01', char_lenth: '4' },
    C_CLAIM: { label: '对客户赔偿', type: 'number', step: '0.01', char_lenth: '4' },
    TTL_COST: { label: '成本小计', type: 'number', step: '0.01', char_lenth: '4' },
    GP: { label: '毛利', type: 'number', step: '0.01', char_lenth: '4' },
    ACC_MON: { label: '财务月度', type: 'text', step: '', char_lenth: '4' },
    REMARK: { label: '内部备注', type: 'text', step: '', char_lenth: '20' },
    ENTER_BY: { label: '开单', type: 'text', step: '', char_lenth: '4' },
    UPDATE_BY: { label: '更新', type: 'text', step: '', char_lenth: '4' },
    LOCKED: { label: '锁', type: 'number', step: '1', char_lenth: '1' },
    CDT: { label: '开单DT', type: 'datetime-local', step: '', char_lenth: '8' },
    UDT: { label: '更新DT', type: 'datetime-local', step: '', char_lenth: '8' }
  }

  try {
    return eval(name);
  } catch (err) { return null; }
}