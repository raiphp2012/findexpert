<?php

class Expertdetailsmodel extends CI_Model {

    public function fetchExpertSubCategory($categoryId) {
        $subCategoryResult = $this->db->get_where('sub_categories', ["categoryId" => $categoryId])->result();
        return $subCategoryResult;
    }

    public function fetchExpertCity($categoryId) {

        $sql = "select expert_address_details.expertCity as cityName from expert_address_details INNER JOIN expert_professional_details ON expert_professional_details.expertId = expert_address_details.expertId where expert_professional_details.expertCategoryId='$categoryId' and expert_address_details.expertCity !='' and expert_professional_details.isVerified=1";
        $query = $this->db->query($sql);


        return $query->result();
    }

    public function fetchExpertPersonalData($subCategoryIds, $experinceInYear,$selectedCategoryId,$locationIds,$limit,$offset=0) {
      $sql = "SELECT distinct(expert_personal_details.expertId),expert_personal_details.expertName
            ,expert_personal_details.expertProfileImageName,expert_personal_details.expertProfileSummary,
expert_professional_details.expertProfessionalCareerStartYear,expert_professional_details.expertInstituteName,expert_categories.categoryName,
expert_address_details.expertCity,
GROUP_CONCAT(distinct sub_categories.`subCategoryName`) as `skills`,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Video' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees  ELSE 0 END) AS Video,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Audio' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Audio,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'In Person' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS InPerson
 FROM expert_personal_details
JOIN expert_professional_details ON expert_personal_details.expertId = expert_professional_details.expertId
JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId
JOIN expert_consultation_details_mapping ON expert_personal_details.expertId = expert_consultation_details_mapping.expertId
JOIN consultation_types ON expert_consultation_details_mapping.consultationTypeId = consultation_types.consultationTypeId
JOIN expert_sub_category_mapping ON expert_sub_category_mapping.expertId = expert_personal_details.expertId
JOIN sub_categories on sub_categories.subCategoryId = expert_sub_category_mapping.subCategoryId
JOIN expert_address_details ON expert_address_details.expertId = expert_personal_details.expertId
WHERE expert_professional_details.isVerified = 1 AND expert_professional_details.expertCategoryId = ";

//JOIN expert_consultation_timing on expert_consultation_timing.expertId = expert_personal_details.expertId
$sql .= $selectedCategoryId." AND (" ;

if (!empty($subCategoryIds)) {
            $subCategory = "(";
            if (count($subCategoryIds) != 0) {
                foreach ($subCategoryIds as $s) {
                    $subCategory .="(sub_categories.subCategoryId =" . $s . " ) OR ";
                }
                $subCategory = preg_replace('/\W\w+\s*(\W*)$/', '$1', $subCategory);
            }
            $sql.=$subCategory . " ) AND " ;
        }

$locationQuery='';
        if (!empty($locationIds[0])) {
             //$sql .=" AND (" ;
          
            if (count($locationIds) != 0) {
                foreach ($locationIds as $s) {
                    $locationQuery .="(expert_personal_details.locationId =" . $s . " ) OR ";
                }
                $locationQuery = preg_replace('/\W\w+\s*(\W*)$/', '$1', $locationQuery);
            }
            $sql.=$locationQuery ;
        }
        

        if (!empty($experinceInYear)) {
if (!empty($subCategoryIds))        
            $experince = "AND  (";
            
            else
            $experince = "(";
            
            if (count($experinceInYear) != 0) {
                foreach ($experinceInYear as $c) {
                    if ($c[0] == 20) {
                        $experince .="((CAST(YEAR(CURDATE()) AS SIGNED) - CAST(expert_professional_details.expertProfessionalCareerStartYear AS SIGNED )) > " . $c[0] . ")  OR ";
                    } else {
                        $experince .="((CAST(YEAR(CURDATE()) AS SIGNED) - CAST(expert_professional_details.expertProfessionalCareerStartYear as SIGNED)) BETWEEN " . $c[0] . " AND " . $c[1] . ") OR ";
                    }
                }
                $experince = preg_replace('/\W\w+\s*(\W*)$/', '$1', $experince);
            }
            $sql.=$experince . " ) ";
        }
$sql .= ")";
        

      $sql.=" GROUP by expert_personal_details.expertId   ORDER BY expert_professional_details.sortBy DESC limit $limit OFFSET $offset";
      //echo $sql;
      //exit();   
      


        $expertPersonalData = $this->db->query($sql);
      
        return $expertPersonalData->result();
    }
    public function num_rows($subCategoryIds, $experinceInYear,$selectedCategoryId,$locationIds) {
       // echo "<pre>";print_r($locationIds);exit;
       $sql = "SELECT distinct(expert_personal_details.expertId),expert_personal_details.expertName,expert_personal_details.expertProfileImageName, expert_personal_details.expertProfileSummary,
expert_professional_details.expertProfessionalCareerStartYear,expert_personal_details.locationId, expert_categories.categoryName,expert_address_details.expertCity,
GROUP_CONCAT(distinct sub_categories.`subCategoryName`) as `skills`,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Video' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees  ELSE 0 END) AS Video,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Audio' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Audio,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'In Person' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS InPerson
 FROM expert_personal_details
JOIN expert_professional_details ON expert_personal_details.expertId = expert_professional_details.expertId
JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId
JOIN expert_consultation_details_mapping ON expert_personal_details.expertId = expert_consultation_details_mapping.expertId
JOIN consultation_types ON expert_consultation_details_mapping.consultationTypeId = consultation_types.consultationTypeId
JOIN expert_sub_category_mapping ON expert_sub_category_mapping.expertId = expert_personal_details.expertId
JOIN sub_categories on sub_categories.subCategoryId = expert_sub_category_mapping.subCategoryId
JOIN expert_address_details ON expert_address_details.expertId = expert_personal_details.expertId
WHERE expert_professional_details.isVerified = 1 AND expert_professional_details.expertCategoryId = ";

//JOIN expert_consultation_timing on expert_consultation_timing.expertId = expert_personal_details.expertId
$sql .= $selectedCategoryId." AND (" ;


if (!empty($subCategoryIds)) {
            $subCategory = "(";
            if (count($subCategoryIds) != 0) {
                foreach ($subCategoryIds as $s) {
                    $subCategory .="(sub_categories.subCategoryId =" . $s . " ) OR ";
                }
                $subCategory = preg_replace('/\W\w+\s*(\W*)$/', '$1', $subCategory);
            }
            $sql.=$subCategory . " ) AND " ;
        }

        $locationQuery='';
        if (!empty($locationIds[0])) {
            //$sql .= $locationQuery." AND (" ;
          
            if (count($locationIds) != 0) {
                foreach ($locationIds as $s) {
                    $locationQuery .="(expert_personal_details.locationId =" . $s . " ) OR ";
                }
                $locationQuery = preg_replace('/\W\w+\s*(\W*)$/', '$1', $locationQuery);
            }
            $sql.=$locationQuery  ;
        }
        

        if (!empty($experinceInYear)) {
if (!empty($subCategoryIds))        
            $experince = "OR (";
            
            else
            $experince = "(";
            
            if (count($experinceInYear) != 0) {
                foreach ($experinceInYear as $c) {
                    if ($c[0] == 20) {
                        $experince .="((CAST(YEAR(CURDATE()) AS SIGNED) - CAST(expert_professional_details.expertProfessionalCareerStartYear AS SIGNED )) > " . $c[0] . ")  OR ";
                    } else {
                        $experince .="((CAST(YEAR(CURDATE()) AS SIGNED) - CAST(expert_professional_details.expertProfessionalCareerStartYear as SIGNED)) BETWEEN " . $c[0] . " AND " . $c[1] . ") OR ";
                    }
                }
                $experince = preg_replace('/\W\w+\s*(\W*)$/', '$1', $experince);
            }
            $sql.=$experince . " ) ";
        }
$sql .= ")";
        
//        if (count($subCategoryIds) != 0) {
//            $sql.=" and " . $subCategory . " ) ";
//        }
//        if (count($experinceInYear) != 0) {
//            $sql.=" and ( " . $experince . " ) ";
//        }
        $sql.=" GROUP by expert_personal_details.expertId ORDER BY expert_professional_details.sortBy DESC ";
       
//echo $sql;exit;
        $expertPersonalData = $this->db->query($sql);

        return $expertPersonalData->num_rows();
    }



    function fetchExpertSubCategoryId($expertId) {
        $subCategoryDetails = $this->db->query('SELECT sub_categories.subCategoryId ,sub_categories.subCategoryName FROM sub_categories JOIN expert_sub_category_mapping ON 
expert_sub_category_mapping.subCategoryId = sub_categories.subCategoryId
WHERE expert_sub_category_mapping.expertId = ' . $expertId . ' ');
        return $subCategoryDetails->result();
    }

    function fetchCategoryName($categoryId) {
        $catName = $this->db->get_where('expert_categories', ["categoryId" => $categoryId])->row();
        return $catName->categoryName;
    }

    function saveAppointment($dateTime) {
        $data = ['appointmentDateTime' => $dateTime];
        if ($this->db->insert('appointment_details', $data))
            return 1;
        else
            return 0;
    }

    function fetchExpertCategory() {
        $expertCategories = $this->db->get('expert_categories')->result();
        return $expertCategories;
    }

    public function addExpert($array) {
        return $this->db->insert('expert_personal_details', $array);
    }
    function  fetchviewProfile($expertId)
    {
        $sql="SELECT distinct(expert_personal_details.expertId),expert_personal_details.expertName ,
            expert_personal_details.expertProfileImageName,
            expert_personal_details.expertProfileSummary, 
            expert_professional_details.expertProfessionalCareerStartYear,expert_professional_details.expertInstituteName,GROUP_CONCAT(DISTINCT expert_categories.categoryName) as categoryName,expert_address_details.expertAddressLine1,expert_address_details.expertAddressLine2,expert_address_details.expertCity,expert_address_details.expertPincode,expert_address_details.expertCountry, GROUP_CONCAT(distinct sub_categories.`subCategoryName`) as `skills`,
            MAX(CASE WHEN (consultation_types.consultationTypeName = 'Video' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Video, MAX(CASE WHEN (consultation_types.consultationTypeName = 'Audio' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Audio, MAX(CASE WHEN (consultation_types.consultationTypeName = 'In Person' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS InPerson FROM expert_personal_details JOIN expert_professional_details ON expert_personal_details.expertId = expert_professional_details.expertId JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId JOIN expert_consultation_details_mapping ON expert_personal_details.expertId = expert_consultation_details_mapping.expertId JOIN consultation_types ON expert_consultation_details_mapping.consultationTypeId = consultation_types.consultationTypeId JOIN expert_sub_category_mapping ON expert_sub_category_mapping.expertId = expert_personal_details.expertId JOIN sub_categories on sub_categories.subCategoryId = expert_sub_category_mapping.subCategoryId JOIN expert_address_details ON expert_address_details.expertId = expert_personal_details.expertId WHERE 
expert_personal_details.expertId='$expertId'";
        $expertPersonalData = $this->db->query($sql);
     
        return $expertPersonalData->row();
        
        
    }
     function defaultSearchData($categoryId,$limit,$offset=0)
    {
         $sql="SELECT distinct(expert_personal_details.expertId),expert_personal_details.expertName
            ,expert_personal_details.expertProfileImageName,expert_personal_details.expertProfileSummary,
expert_professional_details.expertProfessionalCareerStartYear,expert_professional_details.expertInstituteName,expert_categories.categoryName,
expert_address_details.expertCity,
GROUP_CONCAT(distinct sub_categories.`subCategoryName`) as `skills`,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Video' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees  ELSE 0 END) AS Video,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Audio' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Audio,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'In Person' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS InPerson
 FROM expert_personal_details
JOIN expert_professional_details ON expert_personal_details.expertId = expert_professional_details.expertId
JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId
JOIN expert_consultation_details_mapping ON expert_personal_details.expertId = expert_consultation_details_mapping.expertId
JOIN consultation_types ON expert_consultation_details_mapping.consultationTypeId = consultation_types.consultationTypeId
JOIN expert_sub_category_mapping ON expert_sub_category_mapping.expertId = expert_personal_details.expertId
JOIN sub_categories on sub_categories.subCategoryId = expert_sub_category_mapping.subCategoryId
JOIN expert_address_details ON expert_address_details.expertId = expert_personal_details.expertId
WHERE expert_professional_details.isVerified = 1 AND expert_professional_details.expertCategoryId =$categoryId GROUP by expert_personal_details.expertId   ORDER BY expert_professional_details.sortBy DESC limit $limit OFFSET $offset"; 
    $expertPersonalData = $this->db->query($sql);
      
        return $expertPersonalData->result();
    }
    
  function defaultSearchNumOfRows($categoryId)
  {
   $sql="SELECT distinct(expert_personal_details.expertId),expert_personal_details.expertName
            ,expert_personal_details.expertProfileImageName,expert_personal_details.expertProfileSummary,
expert_professional_details.expertProfessionalCareerStartYear,expert_professional_details.expertInstituteName,expert_categories.categoryName,
expert_address_details.expertCity,
GROUP_CONCAT(distinct sub_categories.`subCategoryName`) as `skills`,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Video' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees  ELSE 0 END) AS Video,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'Audio' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS Audio,
MAX(CASE WHEN (consultation_types.consultationTypeName = 'In Person' and expert_consultation_details_mapping.consultationTypeId=consultation_types.consultationTypeId and expert_personal_details.expertId = expert_consultation_details_mapping.expertId ) THEN expert_consultation_details_mapping.consultationFees ELSE 0 END) AS InPerson
 FROM expert_personal_details
JOIN expert_professional_details ON expert_personal_details.expertId = expert_professional_details.expertId
JOIN expert_categories ON expert_categories.categoryId = expert_professional_details.expertCategoryId
JOIN expert_consultation_details_mapping ON expert_personal_details.expertId = expert_consultation_details_mapping.expertId
JOIN consultation_types ON expert_consultation_details_mapping.consultationTypeId = consultation_types.consultationTypeId
JOIN expert_sub_category_mapping ON expert_sub_category_mapping.expertId = expert_personal_details.expertId
JOIN sub_categories on sub_categories.subCategoryId = expert_sub_category_mapping.subCategoryId
JOIN expert_address_details ON expert_address_details.expertId = expert_personal_details.expertId
WHERE expert_professional_details.isVerified = 1 AND expert_professional_details.expertCategoryId =$categoryId GROUP by expert_personal_details.expertId   ORDER BY expert_professional_details.sortBy DESC "; 
    $expertPersonalData = $this->db->query($sql);
      
        return $expertPersonalData->num_rows();
  
  }  
      

}