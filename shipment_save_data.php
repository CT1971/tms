<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();
  $id = $data["ID"];
  $console_id=$data["CONSOLE_ID"]; 
  $station=$data["STATION"]; 
  $customer=$data["CUSTOMER"]; 
  $order_date=$data["ORDER_DATE"]; 
  $cs_mode=$data["CS_MODE"]; 
  $cs_order=$data["CS_ORDER"]; 
  $cs_ref1=$data["CS_REF1"]; 
  $cs_ref2=$data["CS_REF2"]; 
  $customer_remark=$data["CUSTOMER_REMARK"]; 
  $shipper=$data["SHIPPER"]; 
  $shipper_contact=$data["SHIPPER_CONTACT"]; 
  $ori=$data["ORI"]; 
  $ori_add=$data["ORI_ADD"]; 
  $consignee=$data["CONSIGNEE"]; 
  $consignee_contact=$data["CONSIGNEE_CONTACT"]; 
  $consignee_tel=$data["CONSIGNEE_TEL"]; 
  $dest=$data["DEST"]; 
  $dest_add=$data["DEST_ADD"]; 
  $product_type=$data["PRODUCT_TYPE"]; 
  $product=$data["PRODUCT"]; 
  $quantity=$data["QUANTITY"]; 
  $package=$data["PACKAGE"]; 
  $volume=$data["VOLUME"]; 
  $weight=$data["WEIGHT"]; 
  $value=$data["VALUE"]; 
  $chargable_vw=$data["CHARGABLE_VW"]; 
  $chargable_rate_id=$data["CHARGABLE_RATE_ID"]; 
  $dep_date=$data["DEP_DATE"]; 
  $eta_date=$data["ETA_DATE"]; 
  $est_leadtime=$data["EST_LEADTIME"]; 
  $track=$data["TRACK"]; 
  $arv_date=$data["ARV_DATE"]; 
  $act_leadtime=$data["ACT_LEADTIME"]; 
  $arv_status=$data["ARV_STATUS"]; 
  $pod_id=$data["POD_ID"]; 
  $pod_date=$data["POD_DATE"]; 
  $op_remark=$data["OP_REMARK"]; 
  $damage_status=$data["DAMAGE_STATUS"]; 
  $damage_report=$data["DAMAGE_REPORT"]; 
  $damage_resolution=$data["DAMAGE_RESOLUTION"]; 
  $pickup_jobno=$data["PICKUP_JOBNO"]; 
  $vendor=$data["VENDOR"]; 
  $vendor_mode=$data["VENDOR_MODE"]; 
  $vendor_vw=$data["VENDOR_VW"]; 
  $vendor_rate_id=$data["VENDOR_RATE_ID"]; 
  $r_allin=$data["R_ALLIN"]; 
  $r_ftl=$data["R_FTL"]; 
  $r_ltl_rate=$data["R_LTL_RATE"]; 
  $r_ltl=$data["R_LTL"]; 
  $r_pickup=$data["R_PICKUP"]; 
  $r_delivery=$data["R_DELIVERY"]; 
  $r_oth1=$data["R_OTH1"]; 
  $r_oth2=$data["R_OTH2"]; 
  $r_claim=$data["R_CLAIM"]; 
  $ttl_rev=$data["TTL_REV"]; 
  $c_allin=$data["C_ALLIN"]; 
  $c_ftl=$data["C_FTL"]; 
  $c_ltl_rate=$data["C_LTL_RATE"]; 
  $c_ltl=$data["C_LTL"]; 
  $c_pickup=$data["C_PICKUP"]; 
  $c_delivery=$data["C_DELIVERY"]; 
  $c_oth1=$data["C_OTH1"]; 
  $c_oth2=$data["C_OTH2"]; 
  $c_claim=$data["C_CLAIM"]; 
  $ttl_cost=$data["TTL_COST"]; 
  $gp=$data["GP"]; 
  $acc_mon=$data["ACC_MON"]; 
  $remark=$data["REMARK"]; 
  $enter_by=$data["ENTER_BY"]; 
  $update_by=$data["UPDATE_BY"]; 
  $locked=$data["LOCKED"]; 

 
  if ($id == 0 || $id==''){
      $sql = 'insert into shipment (ID, CONSOLE_ID, STATION, CUSTOMER, ORDER_DATE, CS_MODE, CS_ORDER, CS_REF1, CS_REF2, CUSTOMER_REMARK, SHIPPER, SHIPPER_CONTACT, ORI, ORI_ADD, CONSIGNEE, CONSIGNEE_CONTACT, CONSIGNEE_TEL, DEST, DEST_ADD, PRODUCT_TYPE, PRODUCT, QUANTITY, PACKAGE, VOLUME, WEIGHT, VALUE, CHARGABLE_VW, CHARGABLE_RATE_ID, DEP_DATE, ETA_DATE, EST_LEADTIME, TRACK, ARV_DATE, ACT_LEADTIME, ARV_STATUS, POD_ID, POD_DATE, OP_REMARK, DAMAGE_STATUS, DAMAGE_REPORT, DAMAGE_RESOLUTION, PICKUP_JOBNO, VENDOR, VENDOR_MODE, VENDOR_VW, VENDOR_RATE_ID, R_ALLIN, R_FTL, R_LTL_RATE, R_LTL, R_PICKUP, R_DELIVERY, R_OTH1, R_OTH2, R_CLAIM, TTL_REV, C_ALLIN, C_FTL, C_LTL_RATE, C_LTL, C_PICKUP, C_DELIVERY, C_OTH1, C_OTH2, C_CLAIM, TTL_COST, GP, ACC_MON, REMARK, ENTER_BY, UPDATE_BY, LOCKED) values ('
      . '"' . 0 . '"' .','
      . '"' . $console_id . '"' .','
      . '"' . $station . '"' .','
      . '"' . $customer . '"' .','
      . '"' . $order_date . '"' .','
      . '"' . $cs_mode . '"' .','
      . '"' . $cs_order . '"' .','
      . '"' . $cs_ref1 . '"' .','
      . '"' . $cs_ref2 . '"' .','
      . '"' . $customer_remark . '"' .','
      . '"' . $shipper . '"' .','
      . '"' . $shipper_contact . '"' .','
      . '"' . $ori . '"' .','
      . '"' . $ori_add . '"' .','
      . '"' . $consignee . '"' .','
      . '"' . $consignee_contact . '"' .','
      . '"' . $consignee_tel . '"' .','
      . '"' . $dest . '"' .','
      . '"' . $dest_add . '"' .','
      . '"' . $product_type . '"' .','
      . '"' . $product . '"' .','
      . '"' . $quantity . '"' .','
      . '"' . $package . '"' .','
      . '"' . $volume . '"' .','
      . '"' . $weight . '"' .','
      . '"' . $value . '"' .','
      . '"' . $chargable_vw . '"' .','
      . '"' . $chargable_rate_id . '"' .','
      . ($dep_date=="" ? 'null,' : '"' . $dep_date . '"' .',')
      . ($eta_date=="" ? 'null,' : '"' . $eta_date . '"' .',')
      . ($est_leadtime=="" ? 'null,' : '"' . $est_leadtime . '"' .',')
      . '"' . $track . '"' .','
      . ($arv_date=="" ? 'null,' : '"' . $arv_date . '"' .',')
      . ($act_leadtime=="" ? 'null,' : '"' . $act_leadtime . '"' .',')
      . '"' . $arv_status . '"' .','
      . '"' . $pod_id . '"' .','
      . ($pod_date=="" ? 'null,' : '"' . $pod_date . '"' .',')
      . '"' . $op_remark . '"' .','
      . '"' . $damage_status . '"' .','
      . '"' . $damage_report . '"' .','
      . '"' . $damage_resolution . '"' .','
      . '"' . $pickup_jobno . '"' .','
      . '"' . $vendor . '"' .','
      . '"' . $vendor_mode . '"' .','
      . '"' . $vendor_vw . '"' .','
      . '"' . $vendor_rate_id . '"' .','
      . '"' . $r_allin . '"' .','
      . '"' . $r_ftl . '"' .','
      . '"' . $r_ltl_rate . '"' .','
      . '"' . $r_ltl . '"' .','
      . '"' . $r_pickup . '"' .','
      . '"' . $r_delivery . '"' .','
      . '"' . $r_oth1 . '"' .','
      . '"' . $r_oth2 . '"' .','
      . '"' . $r_claim . '"' .','
      . '"' . $ttl_rev . '"' .','
      . '"' . $c_allin . '"' .','
      . '"' . $c_ftl . '"' .','
      . '"' . $c_ltl_rate . '"' .','
      . '"' . $c_ltl . '"' .','
      . '"' . $c_pickup . '"' .','
      . '"' . $c_delivery . '"' .','
      . '"' . $c_oth1 . '"' .','
      . '"' . $c_oth2 . '"' .','
      . '"' . $c_claim . '"' .','
      . '"' . $ttl_cost . '"' .','
      . '"' . $gp . '"' .','
      . '"' . $acc_mon . '"' .','
      . '"' . $remark . '"' .','
      . '"' . $enter_by . '"' .','
      . '"' . $update_by . '"' .','
      . '"' . $locked . '"' .''
      .')';
      
      #echo $sql; return;
      $response = '新订单录入';
    
  }else{
    
      $sql = 'update shipment set '
      .'CONSOLE_ID ="'.$console_id.'",'
      .'STATION ="'.$station.'",'
      .'CUSTOMER ="'.$customer.'",'
      .'ORDER_DATE ="'.$order_date.'",'
      .'CS_MODE ="'.$cs_mode.'",'
      .'CS_ORDER ="'.$cs_order.'",'
      .'CS_REF1 ="'.$cs_ref1.'",'
      .'CS_REF2 ="'.$cs_ref2.'",'
      .'CUSTOMER_REMARK ="'.$customer_remark.'",'
      .'SHIPPER ="'.$shipper.'",'
      .'SHIPPER_CONTACT ="'.$shipper_contact.'",'
      .'ORI ="'.$ori.'",'
      .'ORI_ADD ="'.$ori_add.'",'
      .'CONSIGNEE ="'.$consignee.'",'
      .'CONSIGNEE_CONTACT ="'.$consignee_contact.'",'
      .'CONSIGNEE_TEL ="'.$consignee_tel.'",'
      .'DEST ="'.$dest.'",'
      .'DEST_ADD ="'.$dest_add.'",'
      .'PRODUCT_TYPE ="'.$product_type.'",'
      .'PRODUCT ="'.$product.'",'
      .'QUANTITY ="'.$quantity.'",'
      .'PACKAGE ="'.$package.'",'
      .'VOLUME ="'.$volume.'",'
      .'WEIGHT ="'.$weight.'",'
      .'VALUE ="'.$value.'",'
      .'CHARGABLE_VW ="'.$chargable_vw.'",'
      .'CHARGABLE_RATE_ID ="'.$chargable_rate_id.'",'
      . ($dep_date =='' ? 'DEP_DATE = null,' :'DEP_DATE ="'.$dep_date.'",')        
      #.'DEP_DATE ="'.$dep_date.'",'
      . ($eta_date =='' ? 'ETA_DATE = null,' :'ETA_DATE ="'.$eta_date.'",')   
      #.'ETA_DATE ="'.$eta_date.'",'
      . ($est_leadtime =='' ? 'EST_LEADTIME = null,' :'EST_LEADTIME ="'.$est_leadtime.'",')   
      #.'EST_LEADTIME ="'.$est_leadtime.'",'
      .'TRACK ="'.$track.'",'
      . ($arv_date =='' ? 'ARV_DATE = null,' :'ARV_DATE ="'.$arv_date.'",')   
      #.'ARV_DATE ="'.$arv_date.'",'
      . ($act_leadtime =='' ? 'ACT_LEADTIME = null,' :'ACT_LEADTIME ="'.$act_leadtime.'",')   
      #.'ACT_LEADTIME ="'.$act_leadtime.'",'
      .'ARV_STATUS ="'.$arv_status.'",'
      .'POD_ID ="'.$pod_id.'",'
      . ($pod_date =='' ? 'POD_DATE = null,' :'POD_DATE ="'.$pod_date.'",')   
      #.'POD_DATE ="'.$pod_date.'",'
      .'OP_REMARK ="'.$op_remark.'",'
      .'DAMAGE_STATUS ="'.$damage_status.'",'
      .'DAMAGE_REPORT ="'.$damage_report.'",'
      .'DAMAGE_RESOLUTION ="'.$damage_resolution.'",'
      .'PICKUP_JOBNO ="'.$pickup_jobno.'",'
      .'VENDOR ="'.$vendor.'",'
      .'VENDOR_MODE ="'.$vendor_mode.'",'
      .'VENDOR_VW ="'.$vendor_vw.'",'
      .'VENDOR_RATE_ID ="'.$vendor_rate_id.'",'
      .'R_ALLIN ="'.$r_allin.'",'
      .'R_FTL ="'.$r_ftl.'",'
      .'R_LTL_RATE ="'.$r_ltl_rate.'",'
      .'R_LTL ="'.$r_ltl.'",'
      .'R_PICKUP ="'.$r_pickup.'",'
      .'R_DELIVERY ="'.$r_delivery.'",'
      .'R_OTH1 ="'.$r_oth1.'",'
      .'R_OTH2 ="'.$r_oth2.'",'
      .'R_CLAIM ="'.$r_claim.'",'
      .'TTL_REV ="'.$ttl_rev.'",'
      .'C_ALLIN ="'.$c_allin.'",'
      .'C_FTL ="'.$c_ftl.'",'
      .'C_LTL_RATE ="'.$c_ltl_rate.'",'
      .'C_LTL ="'.$c_ltl.'",'
      .'C_PICKUP ="'.$c_pickup.'",'
      .'C_DELIVERY ="'.$c_delivery.'",'
      .'C_OTH1 ="'.$c_oth1.'",'
      .'C_OTH2 ="'.$c_oth2.'",'
      .'C_CLAIM ="'.$c_claim.'",'
      .'TTL_COST ="'.$ttl_cost.'",'
      .'GP ="'.$gp.'",'
      .'ACC_MON ="'.$acc_mon.'",'
      .'REMARK ="'.$remark.'",'
      .'ENTER_BY ="'.$enter_by.'",'
      .'UPDATE_BY ="'.$update_by.'",'
      .'LOCKED ="'.$locked.'"'
      .' where ID ="'.$id.'"';
      
      $response = '更新完成'.$id;
  }


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($conn->query($sql) === TRUE) {
      if($id == 0){
        $last_id = $conn->insert_id;
        $response .= ':'.$last_id;
      }
      echo $response; 
  } else {
      echo "Error: " .$conn->error .$sql;
  }

  $conn->close();
  return;

?>
