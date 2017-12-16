<?php
  Class Codefinder_model extends CI_Model {

    public function get_icd($term)
    {
      $this->db->like('description', $term);
      $this->db->or_like('category', $term);
      $this->db->or_like('icd', $term);
      $this->db->order_by('category', 'ASC');
      $query = $this->db->get('medical');
      return $query->result();
    }

    public function get_rvs($term)
    {
      $this->db->like('description', $term);
      $this->db->or_like('rvs', $term);
      $this->db->order_by('description', 'ASC');
      $query = $this->db->get('surgical');
      return $query->result();
    }

  }
