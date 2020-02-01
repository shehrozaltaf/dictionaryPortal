<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MSettings extends CI_Model
{
    function getAllGroups()
    {

        $this->db->select('*');
        $this->db->from('group');
        $this->db->where('isActive', 1);
        $this->db->order_By('idGroup', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditGroup($idGroup)
    {
        $this->db->select('*');
        $this->db->from('group');
        $this->db->where('idGroup', $idGroup);
        $query = $this->db->get();
        return $query->result();
    }

    function selectAllForm()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function selectFormGroupData($idGroup)
    {
        $this->db->select('pagegroup.idPages,
	pagegroup.CanAdd,
	pagegroup.CanEdit,
	pagegroup.CanDelete,
	pagegroup.CanView,
	pagegroup.CanViewAllDetail,
	pagegroup.idPageGroup,
	pages.pageName,
	pages.pageUrl,
	pages.isParent,
	pages.idParent,
	pages.menuIcon,
	pages.menuClass,
	pages.isMenu,
	pages.sort_no');
        $this->db->from('pagegroup');
        $this->db->join('pages', 'pagegroup.idPages = pages.idPages', 'left');
        $this->db->join('group', 'pagegroup.idGroup = `group`.idGroup', 'left');
        $this->db->where('pages.isActive', 1);
        $this->db->where('pagegroup.idGroup', $idGroup);
        $this->db->order_by('pages.sort_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function fgAdd($Data)
    {
        $this->db->where('idPageGroup', $Data["idPageGroup"]);
        $update = $this->db->update('pagegroup', $Data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUserRights($idGroup, $CanView = '', $FormName = '')
    {
        $this->db->select('pagegroup.idPages,
	pagegroup.CanAdd,
	pagegroup.CanEdit,
	pagegroup.CanDelete,
	pagegroup.CanView,
	pagegroup.CanViewAllDetail,
	pagegroup.idPageGroup,
	pages.pageName,
	pages.pageUrl,
	pages.isParent,
	pages.idParent,
	pages.menuIcon,
	pages.menuClass,
	pages.isMenu,
	pages.sort_no');
        $this->db->from('pagegroup');
        $this->db->join('pages', 'pagegroup.idPages = pages.idPages', 'left');
        $this->db->where('pages.isActive', 1);
        $this->db->where('pages.isMenu', 1);
        $this->db->where('pagegroup.idGroup', $idGroup);
        if ($CanView != '' && $CanView != '0') {
            $this->db->where('pagegroup.CanView', 1);
        }
        if ($FormName != '' && $FormName != '0') {
            $this->db->where('pages.pageUrl', $FormName);
        }
        $this->db->order_by('pages.sort_no', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}